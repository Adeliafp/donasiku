<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Otentikasi kredensial
        $request->authenticate();

        // Regenerasi session setelah login
        $request->session()->regenerate();

        // Ambil data user yang login
        $user = Auth::user();

        // Redirect berdasarkan peran (role)
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'donatur') {
            return redirect()->route('donatur.dashboard');
        } else {
            Auth::logout(); // Logout jika peran tidak dikenali
            return redirect()->route('login')->with('error', 'Peran tidak dikenali.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
