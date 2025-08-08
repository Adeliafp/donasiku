<!DOCTYPE html>
<html>
<head>
    <title>Edit Donasi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Edit Donasi Barang</h1>

    <form action="{{ route('donasi-barang.update', $donasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $donasi->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $donasi->deskripsi }}</textarea>
        </div>
       
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
