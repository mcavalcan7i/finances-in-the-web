<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class autenticacaoLogin
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
        // return $next($request);
        session_start();

        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request);
        } else {
            return redirect()->route('login-screen');
        }
    }
}
