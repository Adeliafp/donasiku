<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Donasi Uang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">📋 Daftar Donasi Uang</h1>

            @if (auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('donasi-uang.create') }}" class="btn btn-primary">
                    ➕ Tambah Donasi Uang
                </a>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Target</th>
                        <th scope="col">Terkumpul</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($donasi as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</td>
                            <td>Rp{{ number_format($item->target, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($item->terkumpul, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $item->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('donasi-uang.show', $item->id) }}" class="btn btn-sm btn-info">
                                    👁 Lihat
                                </a>

                                @if (auth()->check() && auth()->user()->is_admin)
                                    <a href="{{ route('donasi-uang.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        ✏️ Edit
                                    </a>

                                    <form action="{{ route('donasi-uang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus donasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            🗑 Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada donasi yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
