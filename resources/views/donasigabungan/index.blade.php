<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Donasi Gabungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gabungan.css') }}">
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

    <!-- Konten Donasi Gabungan -->
    <div class="container">
        <h2>Donasi Uang</h2>
        @if($donasiUang->isEmpty())
            <p>Tidak ada donasi uang.</p>
        @else
            <ul>
                @foreach($donasiUang as $donasi)
                    <li>
                        <strong>{{ $donasi->judul }}</strong> - {{ Str::limit($donasi->deskripsi, 100) }}<br>
                        @auth
                            <a href="{{ route('donasiuang.show', $donasi->id) }}">Donasi Sekarang</a>
                        @else
                            <a href="{{ route('login') }}">Login untuk Donasi</a>
                        @endauth
                    </li>
                @endforeach
            </ul>
        @endif

        <h2>Donasi Barang</h2>
        @if($donasiBarang->isEmpty())
            <p>Tidak ada donasi barang.</p>
        @else
            <ul>
                @foreach($donasiBarang as $donasi)
                    <li>
                        <strong>{{ $donasi->judul }}</strong> - {{ Str::limit($donasi->deskripsi, 100) }}<br>
                        @auth
                            <a href="{{ route('donasibarang.show', $donasi->id) }}">Donasi Sekarang</a>
                        @else
                            <a href="{{ route('login') }}">Login untuk Donasi</a>
                        @endauth
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</body>
</html>
