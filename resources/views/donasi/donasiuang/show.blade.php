<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Donasi - {{ $donasi->judul }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
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

   <!-- Konten Detail Donasi -->
<main class="container" style="max-width: 700px; margin: 40px auto; background: #f9f9f9; padding: 32px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); font-family: sans-serif;">
    <h2 style="font-size: 28px; font-weight: bold; margin-bottom: 16px;">{{ $donasi->judul }}</h2>

    <p style="font-size: 16px; line-height: 1.6; margin-bottom: 16px;">{{ $donasi->deskripsi }}</p>

    <p style="margin-bottom: 8px;"><strong>Terkumpul:</strong> Rp {{ number_format($donasi->terkumpul, 0, ',', '.') }}</p>
    <p style="margin-bottom: 24px;"><strong>Target:</strong> Rp {{ number_format($donasi->target, 0, ',', '.') }}</p>

    <form action="{{ route('donasiuang.proses', $donasi->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        <input type="number" name="nominal" placeholder="Masukkan jumlah donasi" required
            style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid #ccc; margin-bottom: 16px; font-size: 16px;">
        
        <button type="submit"
            style="background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 6px; font-size: 16px; cursor: pointer;">
            Donasi Sekarang
        </button>
    </form>
</main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
