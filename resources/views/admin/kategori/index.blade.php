<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">
                
                <a href="/admin/kategori/create" class="btn btn-primary mb-2"><i class="fas fa-plus">Tambah</i></a>

                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Makanan</td>
                        <td><div class="d-flex">
                  <a href="/admin/user/edit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                    {{-- <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                    <form action="/admin/user/" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                  </form>
                  </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>