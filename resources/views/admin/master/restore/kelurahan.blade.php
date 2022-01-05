@extends('../admin/layouts/master')

@section('container')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-6 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Trash Data Kelurahan</h6>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/kelurahan" class="btn btn-primary tombol">Kembali</a>
                </div>
            </div>
        </div>
        @if (session()->has('restoreError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('restoreError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('deleteError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('deleteError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kecamatan</th>
                            <th>Nama Kelurahan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kecamatan</th>
                            <th>Nama Kelurahan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kelurahan as $item)
                            <tr>
                                <td>{{ $item->KECAMATAN }}</td>
                                <td>{{ $item->KELURAHAN }}</td>
                                <td>
                                    <form action="/restore-kelurahan" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->ID_KELURAHAN }}">
                                        <button class="btn btn-success tombol border-0">
                                            Restore
                                        </button>
                                    </form>
                                    <form action="/delete-permanent-kelurahan" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->ID_KELURAHAN }}">
                                        <button class="btn btn-danger tombol border-0" onclick="return confirm('Akan menghapus data permanen?');">
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
