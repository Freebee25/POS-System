<div class="row p-2">
    <div class="col-md-10">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">

                <a href="/admin/transaksi/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
                <p>Tanggal Hari ini : {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/admin/transaksi/{{ $item->id }}/edit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <form id="delete-form-{{ $item->id }}" action="/admin/transaksi/{{ $item->id }}" method="POST" style="display: inline;">
                                        @method('delete')
                                        @csrf
                                        <button type="button" onclick="confirmDeletion({{ $item->id }})" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $transaksi->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDeletion(transaksiId) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            document.getElementById('delete-form-' + transaksiId).submit();
        }
    }
</script>
