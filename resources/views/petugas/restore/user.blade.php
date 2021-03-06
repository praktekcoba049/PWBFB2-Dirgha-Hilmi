@extends('../petugas/layouts/master')

@section('container')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola User</h1>
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
                    <a href="/petugas-user" class="btn btn-primary tombol">Kembali</a>
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
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($user as $item)
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td>
                                    <form action="/petugas-restore-user" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-success tombol border-0">
                                            Restore
                                        </button>
                                    </form>
                                    <form action="/petugas-delete-permanent-user" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-danger tombol border-0" onclick="return confirm('Akan menghapus data penrmanen?');">
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
