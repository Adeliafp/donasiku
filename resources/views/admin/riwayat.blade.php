<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Donasi</title>
</head>
<body>
    <h1>Riwayat Donasi Terbaru</h1>
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
            @foreach($riwayat as $donasi)
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
        {{ $riwayat->links() }}
    </div>
</body>
</html>