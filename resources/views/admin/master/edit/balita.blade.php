@extends('../admin/layouts/master')

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
        <form action="/balita-edit" method="post">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $balita->ID_BALITA }}">
            </div>
            <div class="form-group">
                <select name="id_posyandu" class="form-control text-center @error('id_posyandu') is-invalid @enderror">
                    @foreach ($posyandu as $item)
                        <option value="{{ $item->ID_POSYANDU }}">{{ $item->NAMA_POSYANDU }}</option>
                    @endforeach
                </select>
                @error('id_posyandu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center @error('nama_balita') is-invalid @enderror" id="exampleFirstName"
                        placeholder="Nama Balita" name="nama_balita" value="{{ $balita->NAMA_BALITA }}"> 
                @error('nama_balita')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="number" class="form-control form-control-user text-center @error('nik_orang_tua') is-invalid @enderror" id="exampleFirstName"
                        placeholder="NIK Orang Tua" name="nik_orang_tua" value="{{ $balita->NIK_ORANG_TUA }}">
                @error('nik_orang_tua')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user text-center @error('nama_orang_tua') is-invalid @enderror" id="exampleFirstName"
                        placeholder="Nama Otang Tua" name="nama_orang_tua" value="{{ $balita->NAMA_ORANG_TUA }}">
                @error('nama_orang_tua')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-user text-center @error('tgl_lahir_balita') is-invalid @enderror" id="exampleFirstName"
                        placeholder="Tanggal Lahir" name="tgl_lahir_balita" value="{{ $balita->TGL_LAHIR_BALITA }}">
                @error('tgl_lahir_balita')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="jenis_kelamin_balita" class="form-control text-center @error('jenis_kelamin_balita') is-invalid @enderror">
                    <option value=""><?php if ($balita->JENIS_KELAMIN_BALITA == 1) {
                                            echo "Laki-Laki";
                                        } else echo "Perempuan";
                                     ?>
                    </option>
                    <option value="1">Laki-laki</option>
                    <option value="0">Perempuan</option>
                </select>
                @error('jenis_kelamin_balita')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="status" class="form-control text-center">
                    <option value=""><?php if ($balita->STATUS == 1) {
                                            echo "Aktif";
                                        } else echo "Tidak Aktif";
                                     ?>
                    </option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/balita" class="btn btn-danger btn-user btn-block">
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
