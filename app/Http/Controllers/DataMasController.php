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
        $kelurahan->ID_KECAMATAN = $request->ID_KECAMATAN;
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
                    document.location.href = '/tambah-pos'
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
                    document.location.href = '/tambah-role'
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

    public function hapusRole($id){
        $role = Role::find($id);
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
                    alert('Data gagal dihapus');
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
