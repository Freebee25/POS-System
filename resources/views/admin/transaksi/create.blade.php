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
                        <form method="GET">
                            <div class="d-flex">
                                <select name="produk_id" class="form-control" id="">
                                    <option value="">--- {{ isset($p_detail) ? $p_detail->name : 'Nama Produk'}} ---</option>
                                    @foreach ( $produk as $item )
                                    <option value="{{$item->id}}"> {{$item->id.' - '. $item->name}} </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>

                <form action="/admin/transaksi/detail/create" method="POST">
                    @csrf

                    <input type="hidden" name="transaksi_id" value="{{ Request::segment(3)}}">
                    <input type="hidden" name="produk_id" value="{{ isset($p_detail) ? $p_detail->id : ''}}">
                    <input type="hidden" name="produk_name" value="{{isset ($p_detail) ? $p_detail->name : ''}}">
                    <input type="hidden" name="subtotal" value="{{$subtotal}}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Nama Produk</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="{{ isset($p_detail) ? $p_detail->name : ''}}" class="form-control" disabled name="nama_produk" id="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Harga Produk</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="{{ isset($p_detail) ? $p_detail->harga : ''}}" class="form-control" disabled name="harga_produk" id="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Jumlah Produk</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <a href="?produk_id={{request('produk_id')}}&act=min&jumlah_produk={{$jumlah_produk}}" class="btn btn-primary"><i class="fas fa-minus"></i></a>
                                <input type="number" value="{{$jumlah_produk}}" class="form-control mx-2" name="jumlah_produk">
                                <a href="?produk_id={{request('produk_id')}}&act=plus&jumlah_produk={{$jumlah_produk}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <h5>Subtotal: Rp. {{format_rupiah($subtotal)}}</h5>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <a href="/admin/transaksi" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-6">
    <div class="card">
        <div class="card-title p-4">
            <h4><b>Daftar Produk</b></h4>
        </div>
        <div class="card-body">
            <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Subtotal</th>
                        <th>#</th>
                    </tr>

                    @foreach ($transaksi_detail as $item )


                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $item->produk_name}}</td>
                        <td>{{$item->jumlah_produk}}</td>
                        <td>{{'Rp. '.format_rupiah($item->subtotal)}}</td>
                        <td>
                            <a href="/admin/transaksi/detail/delete?id={{$item->id}}" class="text-danger"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
            </table>
            <a href="/admin/transaksi/detail/selesai/{{Request::segment(3)}}" class="btn btn-success"><i class="fas fa-check"></i> Selesai</a>
            <a href="#" class="btn btn-warning"><i class="fas fa-print"></i> Print</a>
        </div>
    </div>
</div>

<div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-title p-4">
                    <h4><b>Kembalian</b></h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" value="{{$transaksi->total}}" name="total" class="form-control" disabled id="total">
                        </div>
                        <div class="form-group">
                            <label for="bayar">Bayar</label>
                            <input type="number" value="{{request('bayar')}}" name="bayar" class="form-control" id="bayar">
                        </div>
                        <button type="submit" class="btn btn-primary">Hitung</button>
                    </form>
                    <hr>
                    <div class="form-group">
                        <label for="kembalian">Uang Kembalian</label>
                        <input type="number" value="{{format_rupiah($kembalian)}}" disabled name="kembalian" class="form-control" id="kembalian">
                    </div>
                </div>
            </div>
        </div>
    </div>
