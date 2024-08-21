<div class="row p-2">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4><b>Dashboard</b></h4>
            </div>
            <div class="card-body">
                <h6 class="mb-4">Selamat Datang di Halaman Admin <strong>{{ auth()->user()->name }} </strong></h6>
                <hr>
                <p>Nama User <span> : </span><strong>{{ auth()->user()->name }}</strong> </p>
                <hr>
                <p>Tanggal Login <span> : </span><strong>{{ \Carbon\Carbon::now()->format('l, d F Y') }}</strong> </p>
            </div>
        </div>
    </div>
</div>


