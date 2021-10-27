@extends('../petugas/layouts/master')

@section('container')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Balita</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-6 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="#" class="btn btn-warning tombol" onclick="return confirm('Akan menghapus semua data');">Reset Data</a>
                </div>
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
                                <td>{{ $item->JENIS_KELAMIN_BALITA }}</td>
                                <td>{{ $item->NAMA_ORANG_TUA }}</td>
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
