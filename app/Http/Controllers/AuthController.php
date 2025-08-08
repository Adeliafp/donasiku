<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Arahkan berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('berandadonatur');
            }
        }

        return back()->with('error', 'Email atau password salah.')->withInput();
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Tambahkan default role
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Logout user
    $request->session()->invalidate(); // Hapus session
    $request->session()->regenerateToken(); // Regenerasi token CSRF

    return redirect('/'); // Redirect ke halaman beranda
}
}
