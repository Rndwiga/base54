<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Helpers\UserActivationLibrary;
use App\Notifications\newUserLogin;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    private $userActivationLibrary;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->userActivationLibrary = new UserActivationLibrary;
    }
    /**
     * overides authenticated method in Illuminate\Foundation\Auth\AuthenticatesUsers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $this->verify($email,$password);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function verify($email, $password)
    {

        $user = User::where('email', strtolower($email))->first();

        if (strtotime($user->updated_at) > strtotime("01/03/2017"))
        {
            if (app('hash')->check($password, $user->getAuthPassword()))
            {
                return $user->getKey();

            }
        } else {
            if (md5($password) == $user->password)
            {
                $user->password = $password;
                $user->save();

                return $user->getKey();
            }
        }
        return false;
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {

            $this->userActivationLibrary->sendActivationMail($user);

            Auth::logout();
            
            return back()->with('activationWarning', true);
        }
        $this->newLogin($request->ip(), $user);
        return redirect()->intended($this->redirectPath());
    }
    public function activateUser($token)
    {
        if ($user = $this->userActivationLibrary->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }
    private function newLogin($ip, $user)
    {
        $user->notify(new newUserLogin($ip));
    }

}
