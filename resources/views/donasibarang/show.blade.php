<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Donasi Barang - {{ $donasi->judul ?? 'Detail Donasi' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="navbar">
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo_donasiku_1.png') }}" alt="Logo Donasiku">
        </a>
    </div>

    <div class="navbar-center">
        <div class="search-box">
            <input type="text" placeholder="Cari yang ingin kamu tahu" />
        </div>
    </div>

    <nav class="main-nav">
        <a href="{{ url('/') }}">Beranda</a>
        <a href="{{ url('/donasi') }}" class="active">Donasi</a>
        <a href="{{ url('/tentang') }}">Tentang Kami</a>
        @auth
            <a href="{{ route('profile.edit') }}">Profil Saya</a>
        @endauth
        @guest
            <a href="{{ route('login') }}">Login</a>
        @endguest
    </nav>
</header>
<div class="container my-5">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">
            <h3 class="mb-4 text-center">Form Kirim Donasi Barang</h3>

            <form action="{{ route('donasibarang.kirim', $donasi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_pengirim" class="form-label fw-semibold">Nama Pengirim</label>
                    <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" required>
                </div>

                <div class="mb-3">
                    <label for="nomor_telepon_pengirim" class="form-label fw-semibold">Nomor Telepon Pengirim</label>
                    <input type="text" class="form-control" name="nomor_telepon_pengirim" id="nomor_telepon_pengirim" required>
                </div>

                <div class="mb-3">
                    <label for="alamat_pengiriman" class="form-label fw-semibold">Alamat Pengiriman</label>
                    <textarea class="form-control" name="alamat_pengiriman" id="alamat_pengiriman" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi Barang</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_barang" class="form-label fw-semibold">Upload Foto Bukti Pengiriman</label>
                    <input type="file" class="form-control" name="foto_barang" id="foto_barang" accept="image/*" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Kirim Donasi Barang</button>
                </div>
            </form>
        </div>
    </div>
</div>
</html>
