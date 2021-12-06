@extends('../login/layouts/master')

@section('container')

<div class="container m-5 p-5">
    <div class="row justify-content-md-center">
        <div class="col-xl-10 col-lg-12 col-md-9">       
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Log In</h1>
                        </div>
                        <form action="/admin-cek" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="username"
                                    placeholder="Username" name="username" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user text-center"
                                    id="password" placeholder="Password" name="password" required>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                Log In
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="/reg-admin">Haven't an account? Register!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

@endsection