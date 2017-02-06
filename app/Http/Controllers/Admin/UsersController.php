<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequestUpdate;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        $password = $this->randomPassword();
        $input['password'] = bcrypt($password );
        User::create($input);
        Session::flash('message', 'The user has been CREATED !!');
        return redirect('/admin/users');
    }
    private function randomPassword( $length = 8 )
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $length = rand(10, 16);
        $password = substr( str_shuffle(sha1(rand() . time()) . $chars  ), 0, $length );
        return $password;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.changePassword', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequestUpdate $request, $id)
    {
        //  if(trim($request->password) == '')
        //    {
        //      $input = $request->except('password');
        //    }else {
        $input = $request->all();
        //    $input['password'] = bcrypt($request->password);
        //    }
        $user = User::findOrFail($id);
        if($request->email == $user->email)
        {
            $input = $request->except('email');
        }else{
            Validator::make($request->all(), [
                'email' => 'required|email|max:255|unique:users',
            ])->validate();
        }
        $user->update($input);
        Session::flash('message', 'The user has been updated :-)');
        return redirect('/admin/users');
    }
    public function changePassword(Request $request, $id)
    {
        //  echo 'here';
        //  exit;
        Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ])->validate();

        $input = $request->only('password');
        $input['password'] = bcrypt($request->password);
        $user = User::findOrFail($id);
        $user->update($input);
        Session::flash('message', 'Password Updated :-)');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  User::findOrFail($id)->delete();
        $user = User::findOrFail($id);
        unlink(public_path($user->photo->file));
        $user->delete();
        Session::flash('message', 'The user has been deleted :-(');
        return redirect('admin/users');
    }
}
