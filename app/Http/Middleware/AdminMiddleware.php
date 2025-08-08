<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Asumsi: role "admin" disimpan di kolom 'role' pada tabel users
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, redirect atau abort
        return abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
    }
}
