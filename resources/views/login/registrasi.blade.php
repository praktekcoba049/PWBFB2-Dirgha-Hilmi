@extends('../login/layouts/master')

@section('container')

<div class="container m-5 p-5">
    <div class="row justify-content-md-center">
        <div class="col-xl-10 col-lg-12 col-md-9">       
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Register Now!</h1>
                        </div>
                        <form action="/registrasi" method="post">
                            @csrf
                            <div class="form-group">
                                <select name="id_posyandu" class="form-control text-center">
                                    <option value="{{ old('id_posyandu') }}">- Pilih Posyandu -</option>
                                    @foreach ($posyandu as $item)
                                        <option value="{{ $item->ID_POSYANDU }}">{{ $item->NAMA_POSYANDU }} {{ $item->ALAMAT_POSYANDU }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                                        placeholder="Username" name="username" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user text-center"
                                        id="exampleInputPassword" placeholder="Password" name="password">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>    

@endsection