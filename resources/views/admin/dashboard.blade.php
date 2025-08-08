<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar p-3 d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo_donasiku_1.png') }}" alt="Logo Donasiku" height="40">
            </a>
        </div>
        <div class="search-box w-50">
            <input type="text" class="form-control" placeholder="Cari yang ingin kamu tahu">
        </div>
        <nav class="main-nav d-flex gap-3">
    <a href="{{ route('admin.dashboard') }}">Beranda</a>
    <a href="{{ route('donasigabungan') }}">Donasi</a>
    <a href="{{ route('tentang') }}">Tentang Kami</a>
    @auth
        <a href="{{ route('profile.edit') }}">Profil Saya</a>
    @endauth
    @guest
        <a href="{{ route('login') }}">Login</a>
    @endguest
</nav>

    </header>

    <main class="container py-5">
        <h1 class="mb-4">Dashboard Admin</h1>

        <div class="mb-4 d-flex flex-wrap gap-2">
            <a href="{{ route('donasi-uang.create') }}" class="btn btn-primary">➕ Tambah Donasi Uang</a>
            <a href="{{ route('admin.donasi-barang.create') }}" class="btn btn-success">➕ Tambah Donasi Barang</a>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4 col-sm-6">
                <div class="card text-center p-3 shadow-sm">
                    <h5>Total Donasi Uang</h5>
                    <p>{{ $jumlahDonasiUang }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card text-center p-3 shadow-sm">
                    <h5>Total Donasi Barang</h5>
                    <p>{{ $jumlahDonasiBarang }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card text-center p-3 shadow-sm">
                    <h5>Total Permohonan</h5>
                    <p>{{ $jumlahPermohonan }}</p>
                </div>
            </div>
        </div>

        <!-- Ajuan Permohonan -->
        <section class="mb-5">
            <h3 class="mb-3">Ajuan Permohonan Donasi</h3>
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Donatur</th>
                        <th>Jenis Donasi</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
           @forelse ($permohonans as $permohonan) 
<tr>
    <td>{{ $permohonan->nama }}</td>
    <td>{{ ucfirst($permohonan->jenis_donasi) }}</td>
    <td>{{ $permohonan->judul }}</td>
    <td>{{ Str::limit($permohonan->deskripsi, 50) }}</td>
    <td>
        <a href="{{ route('admin.permohonan.show', $permohonan->id) }}" class="btn btn-sm btn-info">Lihat</a>
        <a href="{{ route('admin.permohonan.edit', $permohonan->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('admin.permohonan.destroy', $permohonan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center">Belum ada permohonan masuk.</td>
</tr>
@endforelse

                </tbody>
            </table>
        </section>

        <!-- Riwayat Donasi Uang -->
        <section class="mt-5">
            <h3 class="mb-3">Riwayat Donasi Uang</h3>
            @php use App\Models\Donasi; $donasiUang = Donasi::latest()->get(); @endphp
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Target</th>
                        <th>Terkumpul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($donasiUang as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>Rp {{ number_format($item->target, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->terkumpul ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('donasi-uang.show', $item->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('donasi-uang.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('donasi-uang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">Belum ada data donasi uang.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </section>
<!-- Riwayat Barang Masuk -->
<section class="mt-5">
    <h3 class="mb-3">Riwayat Barang Masuk</h3>
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Judul Donasi</th>
                <th>Nama Pengirim</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($barangMasuk as $barang)
                <tr>
                    <td>{{ $barang->donasiBarang->judul ?? '-' }}</td>
                    <td>{{ $barang->nama_pengirim }}</td>
                    <td>{{ $barang->nomor_telepon_pengirim }}</td>
                    <td>{{ $barang->alamat_pengirim }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>
                        @if ($barang->foto_barang)
                            <img src="{{ asset('storage/' . $barang->foto_barang) }}" width="100" alt="Bukti Foto">
                        @else
                            Tidak ada
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada barang masuk dari donatur.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</section>

    </main>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
