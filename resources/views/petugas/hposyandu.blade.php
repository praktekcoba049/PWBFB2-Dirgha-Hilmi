@extends('../petugas/layouts/master')

@section('container')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Histori Posyandu</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6 pt-4 pl-3">
                <form action="/petugas-hposyandu-cari" method="post">
                    @csrf
                    <div class="text-center">
                        <h3>Filter</h3>
                    </div>
                    <div class="row pb-3">
                        <div class="col-md-12">
                            <select name="ID_POSYANDU" class="form-control text-center">
                                <option value="{{ $posyanduNow->ID_POYSANDU }}">{{ $posyanduNow->NAMA_POSYANDU }}</option>
                                @foreach ($posyandu as $item)
                                    <option value="{{ $item->ID_POSYANDU }}">{{ $item->NAMA_POSYANDU }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-4">
                            <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
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
                                <td>{{ $item->ID_BALITA }}</td>
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
