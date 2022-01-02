@extends('../admin/layouts/master')

@section('container')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Histori Tiap Posyandu</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-5 pt-4 pl-3">
                <form action="/hposyandu">
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
                            <a href="/hposyandu" class="btn btn-success">Tampilkan Semua</a> <br/><br/>
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
                            <th>Tanggal</th>
                            <th>Id Balita</th>
                            <th>BB Balita</th>
                            <th>Tinggi Balita</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tanggal</th>
                            <th>Id Balita</th>
                            <th>BB Balita</th>
                            <th>Tinggi Balita</th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        @foreach($hpos as $item)
                            <tr>
                                <td>{{ $item->UPDATED_AT }}</td>
                                <td>{{ $item->NAMA_BALITA }}</td>
                                <td>{{ $item->BERAT_BADAN_BALITA }}</td>
                                <td>{{ $item->TINGGI_BADAN }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

@endsection    
