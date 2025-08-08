<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Donasi Waktu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2 class="mb-4">Detail Donasi Waktu</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $donasiWaktu->judul }}</h5>
            <p class="card-text"><strong>Deskripsi:</strong><br>{{ $donasiWaktu->deskripsi }}</p>
            <p class="card-text"><strong>Durasi Dibutuhkan:</strong> {{ $donasiWaktu->durasi }} jam</p>
            <a href="{{ route('donasi-waktu.edit', $donasiWaktu->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>