@extends('../admin/layouts/master')

@section('container')

    <div>
        @if (session()->has('tambahSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('tambahSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updateSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('restoreSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('restoreSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleteSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif   
        @if (session()->has('deleteError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('deleteError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif   
    </div> 
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-6 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Posyandu</h6>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/tambah-pos" class="btn btn-primary tombol">Tambah Data</a>
                    <a href="/posyandu-restore" class="btn btn-warning tombol">Restore Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Nama Posyandu</th>
                            <th>Alamat Posyandu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Nama Posyandu</th>
                            <th>Alamat Posyandu</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posyandu as $item)
                            <tr>
                                <td>{{ $item->KECAMATAN }}</td>
                                <td>{{ $item->KELURAHAN }}</td>
                                <td>{{ $item->NAMA_POSYANDU }}</td>
                                <td>{{ $item->ALAMAT_POSYANDU }}</td>
                                <td>
                                    <form action="/edit-pos" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->ID_POSYANDU }}">
                                        <button class="btn btn-primary tombol border-0">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="/pos-hapus" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->ID_POSYANDU }}">
                                        <button class="btn btn-danger tombol border-0" onclick="return confirm('Akan menghapus data');">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection    
