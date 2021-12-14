<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Masters\Histori;
use App\Models\Masters\Balita;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Kecamatan;
use App\Models\Masters\Kelurahan;

class PetugasController extends Controller
{
    public function index($user){
        $balita = Balita::all();
        return view('petugas/balita', ['balita'=>$balita]);
    }

    public function petugas(){
        return view('petugas/home');
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
        $balita->ID_POSYANDU = $request->id_posyandu;
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
        //return $hpos;
        $kecamatan = Kecamatan::all();
        $kecamatanNow = Kecamatan::all()->first();
        $kecamatanNow->ID_KECAMATAN = 0;
        $kecamatanNow->KECAMATAN = "- Pilih Kecamatan -";

        $kelurahan = Kelurahan::all();
        $kelurahanNow = Kelurahan::all()->first();
        $kelurahanNow->ID_KELURAHAN = 0;
        $kelurahanNow->KELURAHAN = "- Pilih Kelurahan -";

        $posyandu = Posyandu::all();
        $posyanduNow = Posyandu::all()->first();
        $posyanduNow->ID_POSYANDU = 0;
        $posyanduNow->NAMA_POSYANDU = "- Pilih Posyandu -";
        return view('petugas/hposyandu', ['hpos'=>$hpos, 'posyandu'=>$posyandu, 'posyanduNow'=>$posyanduNow,
        'kelurahan'=>$kelurahan, 'kelurahanNow'=>$kelurahanNow, 'kecamatan'=>$kecamatan, 'kecamatanNow'=>$kecamatanNow]);
    }

    public function hposCari(Request $request){
        $balita = Balita::where('ID_POSYANDU',$request->ID_POSYANDU)->get('ID_BALITA');
        //return $balita;
        $a=0;
        foreach ($balita as $item){
        $array[$a] = $item->ID_BALITA;
        $a++;
        }
        //return $array;
        $hpos = Histori::whereIn('ID_BALITA', $array)->get();
        
        //return $hpos;
        $kecamatan = Kelurahan::all();
        $valueKecPost = $request->ID_KECAMATAN;
        $kecamatanNow = Posyandu::where('ID_POSYANDU',$valueKecPost)->first();

        $kelurahan = Kelurahan::all();
        $valueKelPost = $request->ID_KELURAHAN;
        $kelurahanNow = Posyandu::where('ID_POSYANDU',$valueKelPost)->first();

        $posyandu = Posyandu::all();
        $valuePosPost = $request->ID_POSYANDU;
        $posyanduNow = Posyandu::where('ID_POSYANDU',$valuePosPost)->first();
        return view('petugas/hposyandu', ['hpos'=>$hpos, 'posyandu'=>$posyandu, 'posyanduNow'=>$posyanduNow,
        'kelurahan'=>$kelurahan, 'kelurahanNow'=>$kelurahanNow, 'kecamatan'=>$kecamatan, 'kecamatanNow'=>$kecamatanNow]);
    }

    public function tambahHpos(){
        $balita = Balita::all();
        return view('petugas/aplikasi/hposyandu', ['balita'=>$balita]);
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
