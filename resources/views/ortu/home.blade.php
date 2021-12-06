@extends('../ortu/layouts/master')

@section('container')

<div class="container mt-5">
    <div class="row justify-content-md-center">

        <!-- Earnings (Monthly) Card Example -->
        <a class="col-lg-4 col-md-6 mb-4" href="/petugas-balita-tambah">
            <div class="">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    ORANGTUA</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">ORANGTUA</div>
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
                                    ORANGTUA</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">ORANGTUA</div>
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