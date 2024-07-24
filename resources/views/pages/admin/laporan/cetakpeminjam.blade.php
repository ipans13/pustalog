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
    <h1>Laporan Peminjaman Buku bulan {{ $bulan }}</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>ID Buku</th>
                <th>Waktu Peminjaman</th>
                <th>Waktu Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->nama }}</td>
                    <td>{{ $laporan->id_referensi }}</td>
                    <td >
                        {{ $laporan->waktu_pinjam }}
                    </td class="{{ $laporan->waktu_kembali == NULL ? 'text-red-600' : 'text-green-600' }}">
                    <td>{{ $laporan->waktu_kembali == NULL ? "Belum ada pengembalian" : $laporan->waktu_kembali }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
