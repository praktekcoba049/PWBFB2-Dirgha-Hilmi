@extends('../ortu/layouts/master')

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
            <form action="/cari-his-balita" method="post">
                @csrf
                <div class="text-center">
                    <h3>Histori Posyandu Balita Anda</h3>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <?php if ($status == 1){ ?> 
                            <input type="text" class="form-control form-control-user text-center" id="nik"
                                placeholder="Masukkan NIK" name="nik" value="{{ $valueNIK }}">
                        <?php
                        } else if ($status == 0){ ?>
                            <input type="text" class="form-control form-control-user text-center" id="nik"
                                placeholder="Masukkan NIK" name="nik">
                        <?php
                        }?>
                    </div>
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
                    <?php
                    if ($status == 1){
                        foreach($hpos as $item){
                    ?>
                        <tr>
                            <td>{{ $item->UPDATED_AT }}</td>
                            <td>{{ $item->ID_BALITA }}</td>
                            <td>{{ $item->BERAT_BADAN_BALITA }}</td>
                            <td>{{ $item->TINGGI_BADAN }}</td>
                        </tr>
                    <?php
                        }
                    }
                    else if ($status == 0){
                    ?>   
                            
                    <?php
                    }
                    ?>
                </tbody>
                
            </table>
        </div>
    </div>
</div>

@endsection