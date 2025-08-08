<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Donasi Uang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f4f8;
        }
        .donasi-card {
            background-color: #e6f0fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
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

    <!-- Konten Donasi -->
    <main class="container mt-5">
        <h2 class="mb-4">Daftar Donasi Uang</h2>

        @foreach ($donasi as $item)
            @php
                $persentase = $item->target > 0 ? ($item->terkumpul / $item->target) * 100 : 0;
            @endphp

            <div class="donasi-card shadow-sm">
                <div class="d-flex flex-column gap-2">
                    <h5 class="fw-bold">{{ $item->judul }}</h5>
                    <p class="mb-1 text-muted">{{ $item->deskripsi }}</p>

                    <div class="progress mb-2" style="height: 10px; border-radius: 20px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ $persentase }}%; border-radius: 20px;"
                            aria-valuenow="{{ $persentase }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <p class="fw-bold mb-0">
                        Rp {{ number_format($item->terkumpul, 0, ',', '.') }}
                        terkumpul dari Rp {{ number_format($item->target, 0, ',', '.') }}
                    </p>

                    <div class="mt-2">
                        @auth
                            <a href="{{ route('donasiuang.show', $item->id) }}" class="btn btn-primary btn-sm">
                                Donasi Sekarang
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm"
                               onclick="return confirm('Silakan login terlebih dahulu untuk berdonasi.')">
                                Login untuk Donasi
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach

        @if ($donasi->isEmpty())
            <div class="alert alert-info">Belum ada donasi tersedia.</div>
        @endif
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
