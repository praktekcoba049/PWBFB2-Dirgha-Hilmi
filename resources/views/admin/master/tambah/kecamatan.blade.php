@extends('../admin/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Tambahkan Data Kecamatan!</h1>
        </div>
        <form action="/kec-store" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="id_kec"
                    placeholder="ID Kecamatan" name="id_kec">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="kecamatan"
                    placeholder="Nama Kecamatan" name="kecamatan">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/kecamatan" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col-sm-6">
                    <button name="submit" class="btn btn-success btn-user btn-block">
                        Tambah
                    </button>
                </div>
            </div>
            <hr>
        </form>
    </div>
</div>

@endsection    
