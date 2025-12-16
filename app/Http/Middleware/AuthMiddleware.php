<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
       
        if (!$request->session()->has('user')) {
            return redirect('/')->with('error', 'Please login first!');;
        }

        return $next($request);
    }
}
