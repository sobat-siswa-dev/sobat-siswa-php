<?php

namespace App\Http\Middleware;

use Closure, Redirect;
use Illuminate\Http\Request;

class AuthStudentMiddleware
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
        if (session()->get("loginStudentToken")) {
            return $next($request);
        } else {
            return Redirect::to(url("/login"))->with("actionError", "Anda tidak dapat mengakses sebelum masuk.");
        }
    }
}
