<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Donasi Barang</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="navbar p-3  border-bottom">
    <div class="d-flex justify-content-between align-items-center container">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo_donasiku_1.png') }}" alt="Logo Donasiku" style="height: 50px;">
        </a>
        <nav class="d-flex gap-3">
            <a href="{{ url('/') }}" class="text-decoration-none">Beranda</a>
            <a href="{{ url('/donasi') }}" class="text-decoration-none">Donasi</a>
            <a href="{{ url('/tentang') }}" class="text-decoration-none">Tentang Kami</a>
            <a href="{{ route('profile.edit') }}" class="text-decoration-none">Profil Saya</a>
        </nav>
    </div>
</header>

<main class="container mt-5">
    <h2 class="mb-4">Daftar Donasi Barang</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.donasi-barang.create') }}" class="btn btn-primary mb-3">+ Tambah Donasi Barang</a>

    @if($donasiBarang->isEmpty())
        <div class="alert alert-warning">Belum ada donasi barang yang terdaftar.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donasiBarang as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->deskripsi, 100) }}</td>
                        <td>
                            <a href="{{ route('admin.donasi-barang.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.donasi-barang.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus donasi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
