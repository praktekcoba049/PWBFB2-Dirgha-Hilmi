<?php

namespace App\Http\Controllers;

use App\Models\Masters\Kecamatan;
use App\Models\Masters\Kelurahan;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Balita;
use App\Models\Masters\Pengguna;
use Illuminate\Http\Request;

class DataMasController extends Controller
{
    public function home(){

    }

    public function kecamatan(){
        $kecamatan = Kecamatan::all();
        //return view('master/kecamatan');
        return view('admin/master/kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function tambahKec(){
        return view('admin/master/tambah/kecamatan');
    }

    public function dataKec(Request $request){
        $kecamatan = new Kecamatan;
        $kecamatan->ID_KECAMATAN = $request->id_kec;
        $kecamatan->KECAMATAN = $request->kecamatan;
        if($kecamatan->save()){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = '/tambah-kec'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = '/tambah-kec'
                </script>
            ";
        }
    }

    public function kelurahan(){
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        //return view('master/kelurahan');
        return view('admin/master/kelurahan', ['kelurahan'=>$kelurahan, 'kecamatan'=>$kecamatan]);
    }

    public function tambahKel(){
        $kecamatan = Kecamatan::all();
        return view('admin/master/tambah/kelurahan', ['kecamatan'=>$kecamatan]);
    }

    public function dataKel(Request $request){
        //return $request;
        $kelurahan = new Kelurahan;
        $kelurahan->ID_KELURAHAN = $request->id_kel;
        $kelurahan->KELURAHAN = $request->kelurahan;
        if($kelurahan->save()){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = '/tambah-kel'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = '/tambah-kel'
                </script>
            ";
        }
    }

    public function posyandu(){
        $posyandu = Posyandu::all();
        //return view('master/posyandu');
        return view('admin/master/posyandu', ['posyandu'=>$posyandu]);
    }

    public function balita(){
        $balita = Balita::all();
        //return view('master/posyandu');
        return view('admin/master/balita', ['balita'=>$balita]);
    }

    public function user(){
        $pengguna = Pengguna::all();
        //return view('master/posyandu');
        return view('admin/master/user', ['pengguna'=>$pengguna]);
    }


}
