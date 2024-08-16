<div class="row p-2">
    <div class="col-md-10">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
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
                {{ $transaksi->links() }}

                <div class="mt-4">
                    <h5><b>Total Penjualan: </b>Rp {{ number_format($total_penjualan, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
