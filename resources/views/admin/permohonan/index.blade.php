<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Permohonan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- ✅ Navbar dari beranda -->
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

    <!-- ✅ Konten utama daftar permohonan -->
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Permohonan</h2>

        <!-- Tombol Kembali -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">⬅ Kembali ke Dashboard</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permohonans as $permohonan)
                    <tr>
                        <td>{{ $permohonan->nama }}</td>
                        <td>{{ $permohonan->judul }}</td>
                        <td>{{ $permohonan->jenis_donasi }}</td>
                        <td>
                            <a href="{{ route('admin.permohonan.show', $permohonan->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada permohonan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
