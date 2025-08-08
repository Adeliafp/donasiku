<!DOCTYPE html>
<html>
<head>
    <title>Edit Donasi Uang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Edit Donasi Uang</h1>

    <form action="{{ route('donasi-uang.update', $donasi->id) }}" method="POST">
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
        <div class="mb-3">
            <label>Target Donasi</label>
            <input type="number" name="target" class="form-control" value="{{ $donasi->target }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="menunggu" {{ $donasi->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="disetujui" {{ $donasi->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            </select>
        </div>
        <input type="hidden" name="jenis_donasi" value="uang">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
