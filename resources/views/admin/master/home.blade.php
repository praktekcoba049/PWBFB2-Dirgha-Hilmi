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
                <h6 class="m-0 font-weight-bold text-primary">Data Balita Stunting Tiap Posyandu</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Posyandu</th>
                            <th>Alamat</th>
                            <th>Jumlah Stunting</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Posyandu</th>
                            <th>Alamat</th>
                            <th>Jumlah Stunting</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posyandu as $item)
                            <tr>
                                <td>{{ $item->NAMA_POSYANDU }}</td>
                                <td>{{ $item->ALAMAT_POSYANDU }}</td>
                                <td>{{ $balita->where('STATUS', 2)->where('ID_POSYANDU',$item->ID_POSYANDU)->count() }}</td>
                                <td>
                                    <a href="/edit-kec" class="btn btn-primary tombol">Ubah</a>
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