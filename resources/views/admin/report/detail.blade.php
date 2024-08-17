<div class="row p-2">
    <div class="col-md-10">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>Detail Transaksi ID: {{ $transaksi->id }}</b></h4>
            </div>
            <div class="card-body">
                <h5><b>Nama Kasir: </b>{{ $transaksi->kasir_name }}</h5>
                <h5><b>Total: </b>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</h5>
                <h5><b>Tanggal Transaksi: </b>{{ $transaksi->created_at->format('d-m-Y H:i:s') }}</h5>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->produk_name }}</td>
                            <td>{{ $detail->jumlah_produk }}</td>
                            <td>{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>