@extends('../petugas/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        @if (session()->has('tambahError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('tambahError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Tambahkan Role!</h1>
        </div>
        <form action="/petugas-user-simpan" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center @error('username') is-invalid @enderror" id="exampleFirstName"
                        placeholder="Username" name="username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user text-center @error('password') is-invalid @enderror"
                        id="exampleInputPassword" placeholder="Password" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                Tambah Akun
            </button>
        </form>
    </div>
</div>

@endsection    
