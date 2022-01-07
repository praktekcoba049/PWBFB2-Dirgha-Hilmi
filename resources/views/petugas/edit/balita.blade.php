@extends('../petugas/layouts/master')

@section('container')

<div class="">
    <div class="p-5">
        @if (session()->has('updateError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('updateError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Edit Balita</h1>
        </div>
        <form action="/petugas-balita-update" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center @error('balita') is-invalid @enderror" id="exampleFirstName"
                        placeholder="Nama Balita" name="balita" value="{{ $balita->NAMA_BALITA }}">
                @error('balita')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center @error('NIK_orangtua') is-invalid @enderror" id="exampleFirstName"
                        placeholder="NIK Orang Tua" name="NIK_orangtua" value="{{ $balita->NIK_ORANG_TUA }}">
                @error('NIK_orangtua')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center @error('orangtua') is-invalid @enderror" id="exampleFirstName"
                        placeholder="Nama Orang Tua" name="orangtua" value="{{ $balita->NAMA_ORANG_TUA }}">
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Tanggal Lahir" name="tgl_lahir" value="{{ $balita->TGL_LAHIR_BALITA }}">
                @error('orangtua')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="jk" class="form-control text-center @error('jk') is-invalid @enderror">
                    @if($balita->JENIS_KELAMIN_BALITA == '1')
                    <option value="1">Laki-laki</option>
                    @else 
                    <option value="0">Perempuan</option>
                    @endif
                    <option value="1">Laki-laki</option>
                    <option value="0">Perempuan</option>
                </select>
                @error('jk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                Update
            </button>
            <a href="/petugas-balita" class="btn btn-danger btn-user btn-block">Batal</a>
        </form>
    </div>
</div>

@endsection    