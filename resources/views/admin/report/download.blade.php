<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan Transaksi {{ $start_date }} </h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>ID Transaksi</th> --}}
                <th>Nama Kasir</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                {{-- <td>{{ $item->id }}</td> --}}
                <td>{{ $item->kasir_name }}</td>
                <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    @foreach($item->details as $detail)
                        {{ $detail->produk_name }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach($item->details as $detail)
                        {{ $detail->jumlah_produk }}<br>
                    @endforeach
                </td>
                <td>{{ number_format($item->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Penjualan: Rp {{ number_format($total_penjualan, 0, ',', '.') }}</h4>
</body>
</html>
