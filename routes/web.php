<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\DonasiBarangController;
use App\Http\Controllers\DonasiGabunganController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonaturController;

// Debug
Route::get('/debug-auth', function () {
    return Auth::check() ? 'Logged in as: ' . Auth::user()->email : 'Not logged in';
});

// Rute Publik
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/donasi', [DonasiGabunganController::class, 'index'])->name('donasigabungan');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // User access
    Route::get('/donasibarang', [DonasiBarangController::class, 'index'])->name('donasi-barang.index');
    Route::get('/donasibarang/{id}', [DonasiBarangController::class, 'show'])->name('donasi-barang.show');
    Route::post('/donasibarang/{id}/kirim', [DonasiBarangController::class, 'storeBarangMasuk'])->name('donasibarang.store');

    // Admin access
    Route::get('/admin/donasi-barang/create', [DonasiBarangController::class, 'create'])->name('admin.donasi-barang.create');
    Route::post('/admin/donasi-barang', [DonasiBarangController::class, 'store'])->name('admin.donasi-barang.store');
    Route::get('/admin/donasi-barang/{id}/edit', [DonasiBarangController::class, 'edit'])->name('admin.donasi-barang.edit');
    Route::get('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'show'])->name('admin.donasi-barang.show');
    Route::put('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'update'])->name('admin.donasi-barang.update');
    Route::delete('/admin/donasi-barang/{id}', [DonasiBarangController::class, 'destroy'])->name('admin.donasi-barang.destroy');
});

// 🔓 Rute umum yang bisa diakses oleh user & admin setelah login
Route::middleware(['auth'])->group(function () {
    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Update password
    Route::patch('/password/update', function (Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:6', 'confirmed'],
        ]);
        $request->user()->update(['password' => Hash::make($request->new_password)]);
        return back()->with('success', 'Password berhasil diperbarui.');
    })->name('password.update');
});

// Rute khusus user
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/berandadonatur', [DonaturController::class, 'index'])->name('berandadonatur');

    // Donasi Uang
    Route::get('/donasi-uang/{id}', [DonasiController::class, 'show'])->name('donasiuang.show');
    Route::post('/donasi-uang/{id}', [DonasiController::class, 'proses'])->name('donasiuang.proses');
    Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');

    // Donasi Barang
    Route::get('/donasibarang', [DonasiBarangController::class, 'index'])->name('donasibarang.index');
    Route::get('/donasibarang/{id}', [DonasiBarangController::class, 'show'])->name('donasibarang.show');
    Route::post('/donasibarang/{id}', [DonasiBarangController::class, 'store'])->name('donasibarang.store');
    Route::post('/donasibarang/{id}/kirim', [DonasiBarangController::class, 'storeBarangMasuk'])->name('donasibarang.kirim');

    // Permohonan
    Route::get('/form-permohonan', [PermohonanController::class, 'create'])->name('formpermohonan');
    Route::post('/permohonan', [PermohonanController::class, 'submitForm'])->name('permohonan.submit');

    //donasi gabungan
    Route::get('/donasigabungan', [DonasiGabunganController::class, 'index'])->name('donasigabungan');
});

// Verifikasi Email
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', fn() => view('auth.verify-email'))->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Rute Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('donasi-uang', DonasiController::class);
    Route::resource('donasi-barang', DonasiBarangController::class, ['as' => 'admin']);


    // Kelola Permohonan
    Route::get('/permohonan', [PermohonanController::class, 'index'])->name('admin.permohonan.index');
    Route::get('/permohonan/{id}', [PermohonanController::class, 'show'])->name('admin.permohonan.show');
    Route::put('/permohonan/{id}/status', [PermohonanController::class, 'updateStatus'])->name('admin.permohonan.updateStatus');

    // Statistik
    Route::get('/grafik-donasi', [AdminController::class, 'grafikDonasi'])->name('admin.grafik.donasi');
    Route::get('/riwayat-donasi', [AdminController::class, 'riwayatDonasi'])->name('admin.riwayat.donasi');
    Route::get('/cari-donasi', [AdminController::class, 'cariDonasi'])->name('admin.cari.donasi');

    // CRUD Permohonan tambahan
    Route::resource('permohonan', PermohonanController::class, ['as' => 'admin']);
});
