<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CabangMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user || !$user->cabang_id) {
            return redirect('/login'); // atau halaman error sesuai kebutuhan
        }
        return $next($request);
    }
}
