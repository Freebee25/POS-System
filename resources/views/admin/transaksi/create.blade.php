<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-title p-4">
                <h4><b>{{ $title }}</b></h4>
            </div>
            <div class="card-body">
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="">Kode Produk</label>
                    </div>
                    <div class="col-md-8">
                        <select name="produk_id" class="form-control" id="">
                            <option value="">--- Nama Produk ---</option>
                            <!-- Tambahkan opsi lainnya di sini -->
                        </select>    
                    </div>               
                </div>   
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="">Nama Produk</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_produk" id="">
                    </div>               
                </div>   

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="">Harga Produk</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="harga_produk" id="">
                    </div>               
                </div>   

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="">Jumlah Produk</label>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary"><i class="fas fa-minus"></i></button>
                            <input type="number" class="form-control mx-2" name="jumlah_produk">
                            <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>               
                </div>   

                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <h5>Subtotal: Rp. 15000</h5>
                    </div>               
                </div>   

                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <a href="/admin/transaksi" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                    </div>               
                </div>   
                               
            </div>           
        </div>
    </div>

    <div class="col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Produk</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mi Goreng</td>
                    <td>2</td>
                    <td>
                        <a href="#" class="text-danger"><i class="fas fa-times"></i></a> 
                    </td>
                </tr>
                <!-- Tambahkan baris lainnya di sini -->
            </tbody>
        </table>

        <a href="#" class="btn btn-success"><i class="fas fa-check"></i> Sukses</a>
        <a href="#" class="btn btn-warning"><i class="fas fa-hourglass-half"></i> Pending</a>
    </div>
</div>

<div class="row p-2">
    <div class="col-md-6">
        <div class="car">
            <div class="card-body">

                <div class="form-group">
                    <label for="">Total</label>
                    <input type="number" name="total" class="form-control" id="">
                </div>

                <div class="form-group">
                    <label for="">Bayar</label>
                    <input type="number" name="bayar" class="form-control" id="">
                </div>

                <button type="submit" class="btn btn-primary">Hitung</button>

                <hr>

                <div class="form-group">
                    <label for="">Uang Kembalian</label>
                    <input type="number" disabled name="bayar" class="form-control" id="">
                </div>

            </div>
        </div>
    </div>
</div>