<div class="container-fluid mt-2">
    <div class="alert alert-success">Halo {{ auth()->user()->name }}, Selamat datang di halaman Admin!</div>
</div>

<div class="row p-2">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4><b>Dashboard</b></h4>
            </div>
            <div class="card-body">
                <h6 class="mb-4">Selamat datang di Aplikasi Kasir</h6>
                <hr>
                <p><strong>Nama User <span> : </span></strong> {{ auth()->user()->name }}</p>
                <hr>
                <p><strong>Tanggal Login <span> : </span></strong> {{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
            </div>
        </div>
    </div>
</div>


