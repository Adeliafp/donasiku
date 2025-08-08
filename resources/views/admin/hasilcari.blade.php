<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian Donasi</title>
</head>
<body>
    <h1>Hasil Pencarian Donasi: "{{ $keyword }}"</h1>

    @if($hasil->count() > 0)
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Nama Donatur</th>
                    <th>Jenis Donasi</th>
                    <th>Detail</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasil as $donasi)
                    <tr>
                        <td>{{ $donasi->user->name ?? '-' }}</td>
                        <td>{{ $donasi->jenis }}</td>
                        <td>{{ $donasi->detail }}</td>
                        <td>{{ $donasi->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $hasil->links() }}
        </div>
    @else
        <p>Tidak ditemukan hasil untuk kata kunci "{{ $keyword }}"</p>
    @endif
</body>
</html>
