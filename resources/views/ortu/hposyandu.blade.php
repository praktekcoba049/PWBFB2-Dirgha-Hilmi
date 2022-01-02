@extends('../ortu/layouts/master')

@section('container')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Balita</h1>

<table class="col-md-8 mb-4">
    <tr>
        <th>Nama Balita</th>
        <td>: {{ $balita->NAMA_BALITA }}</td>
    </tr>
    <tr>
        <th>Orang Tua</th>
        <td>: {{ $balita->NAMA_ORANG_TUA }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>: {{ $balita->TGL_LAHIR_BALITA }}</td>
    </tr>
    <tr>
        <th>Status Saat Ini</th>
        @if($item->STATUS==0)
        <td>Normal</td>
        @else @if($item->STATUS==1)
        <td>Terindikasi Stunting</td>
        @else 
        <td>Stunting</td>
        @endif
    </tr>
</table>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel History Anak Anda</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>BB Balita</th>
                        <th>Tinggi Balita</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>BB Balita</th>
                        <th>Tinggi Balita</th>
                    </tr>
                </tfoot>
                
                <tbody>
                    @foreach($hpos as $item)
                        <tr>
                            <td>{{ $item->UPDATED_AT }}</td>
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