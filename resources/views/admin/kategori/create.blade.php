<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">
                <hr>

                @isset($kategori)
                <form action="/admin/kategori/{{ $kategori->id }}" method="POST">
                    @method('PUT')
                @else
                <form action="/admin/kategori" method="POST">
                @endisset
                
                @csrf
                    <label for="">Nama Kategori</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Kategori" value="{{ isset ($kategori) ? $kategori->name : old('name') }}">
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