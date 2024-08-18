<div class="row p-2">
    <div class="col-md-10">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">
                <form action="/admin/report" method="GET">
                    <div class="form-row">
                        <div class="col">
                            <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai" value="{{ $start_date }}">
                        </div>
                        <div class="col">
                            <input type="date" name="end_date" class="form-control" placeholder="Tanggal Selesai" value="{{ $end_date }}">
                        </div>
                        <div class="col">
                            <select name="sort" class="form-control">
                                <option value="ASC" {{ $sort == 'ASC' ? 'selected' : '' }}>Terlama</option>
                                <option value="DESC" {{ $sort == 'DESC' ? 'selected' : '' }}>Terbaru</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sort"></i> Pilih Berdasarkan
                            </button>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-file"></i> Detail Transaksi
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-success">
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered mt-4">
                    <th>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Nama Kasir</th>
                            <th>Total</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                    </th>
                    <tbody>
                        @foreach($transaksi as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="{{ url('/admin/report/detail', $item->id) }}">{{ $item->id }}</a></td>
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
