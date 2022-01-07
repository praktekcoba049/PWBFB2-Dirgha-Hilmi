@extends('../petugas/layouts/master')

@section('container')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-6 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User Posyandu</h6>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/petugas-user-restore" class="btn btn-warning tombol">Restore Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->username }}</td>
                                <td>
                                    <form action="/user-hapus" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
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
