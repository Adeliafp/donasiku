<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Permohonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Detail Permohonan</h2>

        <div class="mb-3">
            <strong>Nama:</strong> {{ $permohonan->nama }}
        </div>
        <div class="mb-3">
            <strong>Judul:</strong> {{ $permohonan->judul }}
        </div>
        <div class="mb-3">
            <strong>Jenis Donasi:</strong> {{ $permohonan->jenis_donasi }}
        </div>
        <div class="mb-3">
            <strong>Deskripsi:</strong><br>
            {{ $permohonan->deskripsi }}
        </div>
        <div class="mb-4">
            <strong>Foto Bukti:</strong><br>
            <img src="{{ asset('storage/' . $permohonan->foto) }}" alt="Foto Bukti" class="img-fluid" width="300">
        </div>

        <a href="{{ route('admin.permohonan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
