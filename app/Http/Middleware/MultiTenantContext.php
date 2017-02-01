<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MultiTenantContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/portal');
        }

        $context = App::make('App\Multi_Tenant\ClientContext');

        if (Auth::guest()) return Redirect::guest('login');

        $context->set(Auth::user());

        return $next($request);
    }
}
