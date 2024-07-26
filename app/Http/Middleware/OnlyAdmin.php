<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3) {
            return redirect('/dashboard');
        }
        if (Auth::user()->role_id == 4) {
            return redirect('/client');
        }

        return $next($request);
    }
}
