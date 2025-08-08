<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Donasi Waktu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="mb-4">Tambah Donasi Waktu</h2>
    <form action="{{ route('donasi-waktu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi (jam)</label>
            <input type="number" name="durasi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>