@extends('../petugas/layouts/master')

@section('container')

<div class="container mt-5">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row justify-content-md-center">

        <!-- Earnings (Monthly) Card Example -->
        <a class="col-lg-4 col-md-6 mb-4" href="/petugas-balita-tambah">
            <div class="">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Balita</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tambah Balita</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-address-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a> 

        <!-- Earnings (Annual) Card Example -->
        <a class="col-lg-4 col-md-6 mb-4" href="/petugas-hposyandu-tambah">
            <div class="">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    History Posyandu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Buat History</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-barcode fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div> 

@endsection