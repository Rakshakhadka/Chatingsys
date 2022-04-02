<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null)
{
    if (Auth::guard($guard)->check()) {

        if($guard == "supervisor"){
            //user was authenticated with admin guard.
            return redirect()->route('auth.register');
        } else {
            //default guard.
            return redirect()->route('supervisor.login');
        }

    }

    return $next($request);
}
}
