<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container mt-5">
        <div class="row justify-content-md-center">

            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        @if (session()->has('tambahError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('tambahError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Data Balita!</h1>
                        </div>
                        <form action="/petugas-hposyandu-simpan" method="post">
                            @csrf
                            <div class="form-group">
                                <select name="id_balita" class="form-control text-center @error('id_balita') is-invalid @enderror">
                                    <option value="">- Pilih Balita -</option>
                                    @foreach ($balita as $item)
                                        <option value="{{ $item->ID_BALITA }}">{{ $item->NAMA_BALITA }}</option>
                                    @endforeach
                                </select>
                                @error('id_balita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user text-center @error('tgl_posyandu') is-invalid @enderror" id="exampleFirstName"
                                        placeholder="Tanggal Posyandu" name="tgl_posyandu">
                                @error('tgl_posyandu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center @error('berat') is-invalid @enderror" id="exampleFirstName"
                                        placeholder="Berat Badan" name="berat">
                                @error('berat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center @error('tinggi') is-invalid @enderror" id="exampleFirstName"
                                        placeholder="Tinggi Badan" name="tinggi">
                                @error('tinggi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror        
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                Simpan
                            </button>
                            <a href="/petugas" class="btn btn-danger btn-user btn-block">Batal</a>
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

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>