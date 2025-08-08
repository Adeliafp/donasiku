<!DOCTYPE html>
<html>
<head>
    <title>Tambah Donasi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Tambah Donasi Barang</h1>

<form action="{{ route('admin.donasi-barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</body>
</html>
