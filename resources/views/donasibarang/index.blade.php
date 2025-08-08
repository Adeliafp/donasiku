<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Donasi Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Style Lokal -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Fonts & Bootstrap CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
  main {
        padding: 50px 70px;
    }

    h2 {
        color: #003366;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 40px;
        text-align: center;
    }

    .donasi-card {
        background-color: #ffffff;
        border: 1px solid #cfe2ff;
        border-left: 8px solid #0d6efd;
        border-radius: 12px;
        padding: 25px 30px;
        margin-bottom: 25px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
    }

    .donasi-card h5 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #0d3b66;
    }

    .donasi-card p {
        color: #555;
        font-size: 15px;
    }

    .progress {
        height: 10px;
        background-color: #e9ecef;
        border-radius: 20px;
        margin: 15px 0;
    }

.btn-donasi {
    padding: 10px 22px;
    background-color: #f1f4f9; /* warna latar terang */
    color: #0d3e75; /* warna teks biru gelap */
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;
    border: none;
    font-size: 16px;
    display: inline-block;
    box-shadow: none;
    transition: background-color 0.2s ease-in-out;
}

.btn-donasi:hover {
    background-color: #083366; /* warna hover lembut */
    color: #e2e8f0; /* sedikit lebih gelap saat hover */
}


    </style>
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

<main>
    <h2>Daftar Donasi Barang Tersedia</h2>

    @if($donasiBarang->isEmpty())
        <div class="alert alert-info">Tidak ada donasi barang tersedia saat ini.</div>
    @else
        <div class="donasi-container">
            @foreach($donasiBarang as $item)
                <div class="donasi-card">
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ Str::limit($item->deskripsi, 100) }}</p>

                   @auth
    <a href="{{ route('donasibarang.show', $item->id) }}" class="btn-donasi">
        Donasi Sekarang
    </a>
@else
    <a href="{{ route('login') }}" class="btn-donasi"
       onclick="return confirm('Anda harus login terlebih dahulu untuk melakukan donasi. Apakah Anda ingin login sekarang?')">
        Login untuk Donasi
    </a>
@endauth

                </div>
            @endforeach
        </div>
    @endif
</main>

</body>
</html>
