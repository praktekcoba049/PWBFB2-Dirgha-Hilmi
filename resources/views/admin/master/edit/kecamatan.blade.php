@extends('../admin/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Edit Data Kecamatan</h1>
        </div>
        <form action="/kec-edit" method="post">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $kecamatan->ID_KECAMATAN }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="kecamatan"
                    placeholder="Nama Kecamatan" name="kecamatan" value="{{ $kecamatan->KECAMATAN }}">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/kecamatan" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                        Update
                    </button>
                </div>
            </div>
            <hr>
        </form>
        
        
    </div>
</div>

@endsection    
