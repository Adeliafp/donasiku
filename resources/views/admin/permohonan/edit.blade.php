<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Permohonan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <h2>Edit Permohonan Donasi</h2>

    <form action="{{ route('admin.permohonan.update', $permohonan->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Permohonan</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $permohonan->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $permohonan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jenis_donasi" class="form-label">Jenis Donasi</label>
            <input type="text" id="jenis_donasi" name="jenis_donasi" class="form-control" value="{{ old('jenis_donasi', $permohonan->jenis_donasi) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.permohonan.index') }}" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
