@extends('../admin/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        @if (session()->has('tambahError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('tambahError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Tambahkan Data Kelurahan!</h1>
        </div>
        <form action="/kel-store" method="post">
            @csrf
            <div class="form-group">
                <select name="ID_KECAMATAN" class="form-control text-center @error('ID_KECAMATAN') is-invalid @enderror">
                    <option value="">- Pilih Kecamatan -</option>
                    @foreach ($kecamatan as $item)
                        <option value="{{ $item->ID_KECAMATAN }}">{{ $item->KECAMATAN }}</option>
                    @endforeach
                </select>
                @error('ID_KECAMATAN')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center @error('kelurahan') is-invalid @enderror" id="kelurahan"
                    placeholder="Nama Kelurahan" name="kelurahan">
                @error('kelurahan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/kelurahan" class="btn btn-danger btn-user btn-block">Batal</a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Tambah</button>
                </div>
            </div>
            <hr>
        </form>
    </div>
</div>

@endsection    
