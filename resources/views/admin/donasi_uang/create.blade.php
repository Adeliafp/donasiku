<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Donasi Uang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="text-primary mb-4">➕ Tambah Donasi Uang</h2>

    <form action="{{ route('donasi-uang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Donasi</label>
            <input type="text" class="form-control" id="judul" name="judul" required placeholder="Contoh: Bantu Anak Yatim">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required placeholder="Tulis deskripsi singkat mengenai tujuan donasi..."></textarea>
        </div>

        <div class="mb-3">
            <label for="target" class="form-label">Target Donasi (Rp)</label>
            <input type="number" class="form-control" id="target" name="target" required min="1000" placeholder="Contoh: 5000000">
        </div>

        <input type="hidden" name="jenis_donasi" value="uang">

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('donasi-uang.index') }}" class="btn btn-secondary me-2">← Kembali</a>
            <button type="submit" class="btn btn-success">💾 Simpan</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
