<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Donasi Barang - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Detail Donasi Barang (Admin)</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Judul:</strong> {{ $donasi->judul }}</p>
            <p><strong>Deskripsi:</strong> {{ $donasi->deskripsi }}</p>
        </div>
    </div>

    <a href="{{ route('admin.donasi-barang.index') }}" class="btn btn-secondary mt-4">← Kembali</a>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
