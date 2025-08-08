<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah sudah login dan rolenya adalah 'user'
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }

        // Kalau admin atau tidak login
        abort(403, 'Akses ditolak. Halaman ini hanya untuk pengguna.');
    }
}
