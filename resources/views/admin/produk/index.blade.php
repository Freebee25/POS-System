<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">
                
                <a href="/admin/produk/create" class="btn btn-primary mb-2">
                    <i class="fas fa-plus"></i> Tambah
                </a>

                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($produk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/admin/produk/{{ $item->id }}/edit" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="/admin/produk/{{ $item->id }}" method="POST" style="display: inline;">
                                    @method('delete')
                                    @csrf
                                    <button type="button" onclick="confirmDeletion({{ $item->id }})" class="btn btn-danger btn-sm ml-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {{ $produk->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDeletion(produkId) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            document.getElementById('delete-form-' + produkId).submit();
        }
    }
</script>
