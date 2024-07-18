<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">
                <hr>
                <form action="/admin/kategori" method="POST">
                
                @csrf
                    <label for="">Nama Kategori</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Kategori" >
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>                       
                    @enderror

                    <a href="/admin/kategori" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"> Simpan</i></button>
                </form>
                
            </div>
        </div>
    </div>
</div>