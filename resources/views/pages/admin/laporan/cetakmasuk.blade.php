<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .text-green-600 {
            color: #16a34a;
        }
        .text-red-600 {
            color: #dc2626;
        }
    </style>
</head>
<body>
    <h1>Laporan Buku Masuk dan Keluar Bulan {{ $bulan }}</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>Penerbit</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ $laporan->penerbit }}</td>
                    <td class="{{ $laporan->status == 'Masuk' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $laporan->status }}
                    </td>
                    <td>{{ $laporan->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
