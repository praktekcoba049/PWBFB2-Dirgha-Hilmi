<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Masters\Histori;
use App\Models\Masters\Balita;
use App\Models\Masters\Posyandu;

class PetugasController extends Controller
{
    public function index($user){
        $balita = Balita::all();
        return view('petugas/balita', ['balita'=>$balita]);
    }
    
    public function balita(){
        $balita = Balita::all();
        return view('petugas/balita', ['balita'=>$balita]);
    }

    public function tambahBalita(){
        $posyandu = Posyandu::all();
        return view('petugas/aplikasi/balita', ['posyandu'=>$posyandu]);
    }

    public function simpanBalita(Request $request){
        $balita = new Balita;
        $balita->ID_POSYANDU = $request->ID_POSYANDU;
        $balita->NAMA_BALITA = $request->balita;
        $balita->NIK_ORANG_TUA = $request->NIK_orangtua;
        $balita->NAMA_ORANG_TUA = $request->orangtua;
        $balita->TGL_LAHIR_BALITA = $request->tgl_lahir;
        $balita->JENIS_KELAMIN_BALITA = $request->jk;
        $balita->STATUS = $request->status;
        if($balita->save()){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = '/petugas'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = '/petugas-balita-tambah'
                </script>
            ";
        }
    }

    public function hposyandu(){
        $hpos = Histori::all();
        return view('petugas/hposyandu', ['hpos'=>$hpos]);
    }

    public function tambahHpos(){
        $posyandu = Posyandu::all();
        return view('petugas/aplikasi/hposyandu', ['posyandu'=>$posyandu]);
    }

    public function simpanHpos(Request $request){
        $hpos = new Histori;
        $hpos->ID_BALITA = $request->id_balita;
        $hpos->TGL_POSYANDU = $request->tgl_posyandu;
        $hpos->BERAT_BADAN_BALITA = $request->berat;
        $hpos->TINGGI_BADAN = $request->tinggi;
        if($hpos->save()){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = '/petugas'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = '/petugas-balita-tambah'
                </script>
            ";
        }
    }
}
