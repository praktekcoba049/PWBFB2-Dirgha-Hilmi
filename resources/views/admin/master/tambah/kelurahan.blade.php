@extends('../admin/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Tambahkan Data Kelurahan!</h1>
        </div>
        <form action="/kel-store" method="post">
            @csrf
            <div class="form-group">
                <select name="ID_KECAMATAN" class="form-control text-center">
                    <option value="">- Pilih Kecamatan -</option>
                    @foreach ($kecamatan as $item)
                        <option value="{{ $item->ID_KECAMATAN }}">{{ $item->KECAMATAN }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center" id="kelurahan"
                    placeholder="Nama Kelurahan" name="kelurahan">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/kelurahan" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                        Tambah
                    </button>
                </div>
            </div>
            <hr>
        </form>
    </div>
</div>

@endsection    
