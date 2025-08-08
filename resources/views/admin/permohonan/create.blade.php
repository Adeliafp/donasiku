<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ajukan Permohonan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Kustom -->
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

    <!-- ✅ Konten Form Permohonan -->
<main class="container mt-5 mb-5">
  <h1 class="mb-4 text-center">Ajukan Permohonan Donasi</h1>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- ✅ Tambahkan Border dan Padding -->
    <div class="border p-4 rounded shadow-sm bg-light">
        <form action="{{ route('permohonan.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pengaju</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Permohonan</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_donasi" class="form-label">Jenis Donasi</label>
                <select name="jenis_donasi" class="form-control" required>
                    <option value="uang">Uang</option>
                    <option value="barang">Barang</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="foto_bukti" class="form-label">Foto Bukti</label>
                <input type="file" name="foto_bukti" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
        </form>
    </div>
</main>


</body>
</html>
