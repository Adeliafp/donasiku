<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Donasi Waktu - {{ $donasi->nama_kegiatan }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    <!-- Navbar dari halaman beranda -->
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
            <a href="{{ url('/donasi') }}">Donasi</a>
            <a href="{{ url('/tentang') }}">Tentang Kami</a>

            @auth
                <a href="{{ route('profile.edit') }}">Profil Saya</a>
            @endauth

            @guest
                <a href="{{ route('login') }}">Login</a>
            @endguest
        </nav>
    </header>

    <!-- Konten Detail Donasi -->
    <div class="container">
        <h1>{{ $donasi->nama_kegiatan }}</h1>

        <p><strong>Deskripsi:</strong> {{ $donasi->deskripsi }}</p>
        <p><strong>Tanggal:</strong> {{ $donasi->tanggal }}</p>
        <p><strong>Lokasi:</strong> {{ $donasi->lokasi }}</p>

        <a href="{{ route('donasiwaktu.index') }}" class="back-link">← Kembali ke daftar</a>
    </div>

</body>
</html>
