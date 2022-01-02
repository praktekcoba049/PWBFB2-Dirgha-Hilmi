@extends('../ortu/layouts/master')

@section('container')
<div>
    @if (session()->has('cariError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('cariError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Anak Anda</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Balita</th>
                        <th>Orang Tua</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Balita</th>
                        <th>Orang Tua</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                
                <tbody>
                    @foreach($balita as $item)
                    <tr>
                        <td>{{ $item->NAMA_BALITA }}</td>
                        <td>{{ $item->NAMA_ORANG_TUA }}</td>
                        @if($item->STATUS==0)
                        <td>Normal</td>
                        @endif 
                        @if($item->STATUS==1)
                        <td>Terindikasi Stunting</td>
                        @endif
                        @if ($item->STATUS==2)
                        <td>Stunting</td>
                        @endif
                        <td>
                            <form action="/orangtua-balita-history" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id_balita" value="{{ $item->ID_BALITA }}">
                                <button class="btn btn-success tombol border-0">
                                    History Posyandu
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