<div class="container-fluid" pt-2>
    <div class="row">
        <div class="col-med-12">
            <div class="card">

                <div class="card-body">
                        <h4><b>Create Data</b></h4>

                        @isset($user)
                            <form action="/admin/user/{{ $user->id }}" method="POST">
                                @method('put')
                        @else
                            <form action="/admin/user" method="POST">
                        @endisset

                            @csrf
                            <div class="form-group">
                                <label for=""><b>Full Name</b></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" aria-placeholder="Full Name" value="{{ isset($user) ? $user->name : '' }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for=""><b>Email</b></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" aria-placeholder="Email" value="{{ isset($user) ? $user->email : "" }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for=""><b>Password</b></label>
                                <input type="Password" class="form-control @error('password') is-invalid @enderror" name="password" aria-placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for=""><b>Confirm Password</b></label>
                                <input type="password" class="form-control @error('re_password') is-invalid @enderror" name="re_password" aria-placeholder="Password">
                                @error('re_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <a href="/admin/user" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>