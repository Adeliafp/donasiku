<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Donasi Waktu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>

    </style>
</head>
<body>

    <!-- Navbar dari beranda -->
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

    <!-- Konten halaman Donasi Waktu -->
    <main style="padding: 2rem;">
    <h1>Daftar Donasi Waktu</h1>

    @if($donasiWaktu->isEmpty())
        <p>Belum ada donasi waktu.</p>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($donasiWaktu as $item)
                <div class="col">
                    <div class="card shadow-sm p-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
                            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->jadwal)->format('d M Y') }}</p>

                            @auth
                                <a href="{{ route('donasiwaktu.show', $item->id) }}" class="btn btn-primary">Donasi Sekarang</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-warning" onclick="return confirm('Silakan login terlebih dahulu untuk berdonasi.')">
                                    Login untuk Donasi
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</main>

</body>
</html>
