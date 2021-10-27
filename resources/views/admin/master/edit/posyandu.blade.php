@extends('..admin/layouts/master')
@extends('../admin/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Edit Data Posyandu</h1>
        </div>
        <form action="/pos-edit" method="post">
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control form-control-user text-center" id="idPosIn"
                    placeholder="ID Posyandu" name="id" value="{{ $posyandu->ID_POSYANDU }}">
            </div>
            <div class="form-group">
                <select name="ID_KELURAHAN" class="form-control text-center">
                    @foreach ($kelurahan as $item)
                        <option value="{{ $item->ID_KELURAHAN }}">{{ $item->KELURAHAN }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="posyanduIn"
                    placeholder="Nama Posyandu" name="posyandu" value="{{ $posyandu->NAMA_POSYANDU }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="alamat"
                    placeholder="Alamat Posyandu" name="alamat" value="{{ $posyandu->ALAMAT_POSYANDU }}">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/posyandu" class="btn btn-danger btn-user btn-block">
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
