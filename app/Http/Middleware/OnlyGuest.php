<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role_id !== 4) {
                return redirect('/dashboard'); // Mengarahkan ke halaman dashboard
            } elseif ($user->role_id == 4) {
                return redirect('/client'); // Mengarahkan ke halaman client
            }

            return redirect('/login'); // Mengarahkan ke halaman lain jika bukan role_id 1, 2, atau 3
        }

        return $next($request);
    }
}
