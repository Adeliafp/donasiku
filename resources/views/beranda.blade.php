<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasiku - Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="font-sans antialiased">

    <!-- Header / Navbar -->
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
    @auth
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Beranda</a>
        @else
            <a href="{{ route('berandadonatur') }}">Beranda</a>
        @endif
    @else
        <a href="{{ url('/') }}">Beranda</a>
    @endauth

    <a href="{{ route('donasigabungan') }}">Donasi</a>
    <a href="{{ route('tentang') }}">Tentang Kami</a>
    @auth
        <a href="{{ route('profile.edit') }}" class="active">Profil Saya</a>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endauth
</nav>

    </header>

    <!-- Banner Carousel -->
    <section class="banner-carousel">
        <div class="slides">
            <div class="slide">
                <img src="{{ asset('images/banner_donasi_uang.jpg') }}" alt="Banner 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/banner_donasi_barang.jpg') }}" alt="Banner 2">
            </div>
             <div class="slide">
                <img src="{{ asset('images/banner_donasi_waktu.jpg') }}" alt="Banner 3">
            </div>
            <!-- Slide Donasi Waktu dihapus -->
        </div>
    </section>

    <!-- Kategori Donasi -->
    <section class="categories">
        <a href="{{ route('donasi') }}" class="category-card">
            <img src="{{ asset('images/salary.png') }}" alt="Donasi Uang">
            <p>Donasi Uang</p>
        </a>

        <a href="{{ route('donasibarang.index') }}" class="category-card">
            <img src="{{ asset('images/box.png') }}" alt="Donasi Barang">
            <p>Donasi Barang</p>
        </a>

        <!-- Kategori Donasi Waktu dihapus -->

        <a href="{{ url('/form-permohonan') }}" class="category-card">
            <img src="{{ asset('images/pencil.png') }}" alt="Ajukan Permohonan Donasi">
            <p>Ajukan Permohonan Donasi</p>
        </a>
    </section>


    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
