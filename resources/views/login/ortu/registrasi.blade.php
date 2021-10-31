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
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Register Now!</h1>
                        </div>
                        <form action="/reg-ortu" method="post">
                            @csrf
                            <div class="form-group">
                                <select name="id_posyandu" class="form-control text-center">
                                    <option value="">- Pilih Posyandu -</option>
                                    @foreach ($posyandu as $item)
                                        <option value="{{ $item->ID_POSYANDU }}">{{ $item->NAMA_POSYANDU }} {{ $item->ALAMAT_POSYANDU }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                                        placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user text-center"
                                        id="exampleInputPassword" placeholder="Password" name="password1">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user text-center"
                                        id="exampleRepeatPassword" placeholder="Repeat Password" name="password2">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/login-ortu">Already have an account? Login!</a>
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