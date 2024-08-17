<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
</head>
<body>
    <h1>Laporan Transaksi</h1>
    <p>Periode: {{ $start_date }} - {{ $end_date }}</p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Kasir</th>
                <th>Total</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->kasir_name }}</td>
                <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Penjualan: Rp {{ number_format($total_penjualan, 0, ',', '.') }}</h3>
</body>
</html>
