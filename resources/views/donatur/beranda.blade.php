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
            <a href="{{ url('/') }}" class="active">Beranda</a>
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

    <!-- Banner Carousel -->
    <section class="banner-carousel">
        <div class="slides">
            <div class="slide">
                <img src="{{ asset('images/banner_donasi_uang.jpg') }}" alt="Banner Donasi Uang">
            </div>
            <div class="slide">
                <img src="{{ asset('images/banner_donasi_barang.jpg') }}" alt="Banner Donasi Barang">
            </div>
            <div class="slide">
                <img src="{{ asset('images/banner_donasi_waktu.jpg') }}" alt="Banner Donasi waktu">
            </div>
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

      <a href="{{ url('/form-permohonan') }}" class="category-card">
            <img src="{{ asset('images/pencil.png') }}" alt="Ajukan Permohonan Donasi">
            <p>Ajukan Permohonan Donasi</p>
        </a>
    </section>


    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
