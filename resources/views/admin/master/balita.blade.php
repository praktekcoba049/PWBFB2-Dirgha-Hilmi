@extends('../admin/layouts/master')

@section('container')

    <div class="row">
        
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Banyak Balita</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $balita->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-table fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Balita Terindikasi Stunting</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $balita->where('STATUS', 1)->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Balita Stunting</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $balita->where('STATUS', 2)->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-sm-6 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Balita</h6>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-5 pt-4 pl-3">
                <form action="/balita">
                    @csrf
                    <div class="text-center">
                        <h3>Filter</h3>
                    </div>
                    <div class="text-center">
                        <h6 class="text-danger">(*) Pilih salah satu kategori.</h6>
                    </div>
                    <div class="">
                        <select name="kecamatan" class="form-control text-center mt-1">
                            @if ($statusKec==1)
                            <option value="">{{ request('kecamatan') }}</option>
                            @else 
                            <option value="">Pilih Kecamatan</option>
                            @endif
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->KECAMATAN }}">{{ $item->KECAMATAN }}</option>
                            @endforeach
                        </select>
                        <select name="kelurahan" class="form-control text-center mt-1">
                            @if ($statusKel==1)
                            <option value="">{{ request('kelurahan') }}</option>
                            @else
                            <option value="">Pilih Kelurahan</option>
                            @endif
                            @foreach ($kelurahan as $item)
                                <option value="{{ $item->KELURAHAN }}">{{ $item->KELURAHAN }}</option>
                            @endforeach
                        </select>
                        <select name="posyandu" class="form-control text-center mt-1">
                            @if ($statusPos==1)
                            <option value="">{{ request('posyandu') }}</option>
                            @else
                            <option value="">Pilih Posyandu</option>
                            @endif
                            @foreach ($posyandu as $item)
                                <option value="{{ $item->NAMA_POSYANDU }}">{{ $item->NAMA_POSYANDU }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-8">
                            <a href="/balita" class="btn btn-success">Tampilkan Semua</a> <br/><br/>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" name="" class="btn btn-success btn-user btn-block">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Balita</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Orangtua</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Balita</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Orangtua</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($balita as $item)
                            <tr>
                                <td>{{ $item->NAMA_BALITA }}</td>
                                <td>{{ $item->TGL_LAHIR_BALITA }}</td>
                                @if($item->JENIS_KELAMIN_BALITA==0)
                                <td>Perempuan</td>
                                @else
                                <td>Laki-Laki</td>
                                @endif
                                <td>{{ $item->NAMA_ORANG_TUA }}</td>
                                <td>
                                    <a href="#" class="btn btn-danger tombol" onclick="return confirm('Akan menghapus data');">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection    
