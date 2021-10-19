<?php

namespace App\Http\Controllers;

use App\Models\Masters\Kecamatan;
use App\Models\Masters\Kelurahan;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Balita;
use App\Models\Masters\Pengguna;
use App\Models\Masters\Role;
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
                    document.location.href = '/kec'
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

    public function editKec(Request $request){
        //return $request;
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        //return $kecamatan;
        return view('admin/master/edit/kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function simpanKec(Request $request){
        $kecamatan = new Kecamatan;
        $kecamatan->ID_KECAMATAN = $request->idKec;
        $kecamatan->KECAMATAN = $request->kecamatan;
        if($kecamatan->save()){
            echo "
                <script>
                    alert('Data berhasil dirubah');
                    document.location.href = '/kec'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal dirubah');
                    document.location.href = '/tambah-kec'
                </script>
            ";
        }
    }

    public function hapusKec(Request $request){
        //return $request;
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->delete()){
            echo "
                <script>
                    alert('Data berhasil dihapus');
                    document.location.href = '/kecamatan'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal didihapus');
                    document.location.href = '/kecamatan'
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
        $kelurahan->ID_KECAMATAN = $request->ID_KECAMATAN;
        $kelurahan->KELURAHAN = $request->kelurahan;
        if($kelurahan->save()){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = '/kel'
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

    public function hapusKel(Request $request){
        //return $request;
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->delete()){
            echo "
                <script>
                    alert('Data berhasil dihapus');
                    document.location.href = '/kelurahan'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal didihapus');
                    document.location.href = '/kelurahan'
                </script>
            ";
        }
    }

    public function posyandu(){
        $posyandu = Posyandu::all();
        //return view('master/posyandu');
        return view('admin/master/posyandu', ['posyandu'=>$posyandu]);
    }

    public function tambahPos(){
        $kelurahan = Kelurahan::all();
        return view('admin/master/tambah/posyandu', ['kelurahan'=>$kelurahan]);
    }

    public function dataPos(Request $request){
        $posyandu = new Posyandu;
        $posyandu->ID_POSYANDU = $request->id_pos;
        $posyandu->NAMA_POSYANDU = $request->posyandu;
        $posyandu->ALAMAT_POSYANDU = $request->alamat;
        if($posyandu->save()){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = '/pos'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = '/tambah-pos'
                </script>
            ";
        }
    }

    public function hapusPos(Request $request){
        //return $request;
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->delete()){
            echo "
                <script>
                    alert('Data berhasil dihapus');
                    document.location.href = '/posyandu'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal didihapus');
                    document.location.href = '/posyandu'
                </script>
            ";
        }
    }

    public function role(){
        $role = Role::all();
        //return view('master/role');
        return view('admin/master/role', ['role'=>$role]);
    }

    public function tambahRole(){
        return view('admin/master/tambah/role');
    }

    public function dataRole(Request $request){
        $role = new Role;
        $role->ID_ROLE = $request->id_role;
        $role->ROLE = $request->role;
        if($role->save()){
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = '/role'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = '/tambah-role'
                </script>
            ";
        }
    }

    public function hapusRole(Request $request){
        //return $request;
        $role = Role::where('ID_ROLE',$request->id);
        if($role->delete()){
            echo "
                <script>
                    alert('Data berhasil dihapus');
                    document.location.href = '/role'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal didihapus');
                    document.location.href = '/role'
                </script>
            ";
        }
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
