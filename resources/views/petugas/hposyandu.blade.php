@extends('../petugas/layouts/master')

@section('container')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">History Posyandu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Balita</th>
                            <th>BB Balita</th>
                            <th>Tinggi Balita</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Balita</th>
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
