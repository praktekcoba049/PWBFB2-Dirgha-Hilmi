<<<<<<< Updated upstream
@extends('..admin/layouts/master')
=======
@extends('../admin/layouts/master')
>>>>>>> Stashed changes

@section('container')

<div class="">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Edit Data Posyandu</h1>
        </div>
        <form class="user">
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="idPosIn"
                    placeholder="ID Posyandu">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="posyanduIn"
                    placeholder="Nama Posyandu">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="KecamatanIn"
                    placeholder="Alamat Posyandu">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/posyandu" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="#" class="btn btn-success btn-user btn-block">
                        Simpan
                    </a>
                </div>
            </div>
            <hr>
        </form>
    </div>
</div>

@endsection    
