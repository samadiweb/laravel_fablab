<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((Auth::user() && Auth::user()->user_type == "user") || (Auth::user() && Auth::user()->user_type == "admin")) {
            return $next($request);
        }else{

            session()->flush();
            return redirect()->route('login');

        }
        return $next($request);
    }
}
