<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title p-4">
                    <h4><b>{{ $title }}</b></h4>
                </div>
                <div class="card-body">
                    <a href="/admin/user/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>

                    @if (session()->has('success'))
                        <div class="alert alert-success mt-2"><i class="fas fa-check"></i> {{ session('success') }}</div>              
                    @endif

                    <table class="table mt-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-info btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                            <form id="delete-form-{{ $item->id }}" action="/admin/user/{{ $item->id }}" method="POST" style="display: inline;">
                                                @method('delete')
                                                @csrf
                                                <button type="button" onclick="confirmDeletion({{ $item->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDeletion(userId) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
