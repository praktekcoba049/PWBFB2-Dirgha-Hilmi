<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Masters\Histori;
use App\Models\Masters\Balita;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Kecamatan;
use App\Models\Masters\Kelurahan;
use App\Models\Masters\UserRole;
use App\Models\Masters\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $posyandu = Posyandu::all();
        $balita = Balita::latest();
        $status = 0;
        $statusKec = 0;
        $statusKel = 0;
        $statusPos = 0;
        if(request('kecamatan')){
            $status = 1;
            $statusKec = 1;
            $statusKel = 0;
            $statusPos = 0;
            $kecamatanFound = Kecamatan::where('KECAMATAN', request('kecamatan'))->first();
            $kelurahanFound = Kelurahan::where('ID_KECAMATAN', $kecamatanFound->ID_KECAMATAN)->get('ID_KELURAHAN');
            if($kelurahanFound->count()!=0){
                $a=0;
                foreach ($kelurahanFound as $item){
                $array[$a] = $item->ID_KELURAHAN;
                $a++;
                }
                $posyanduFound = Posyandu::whereIn('ID_KELURAHAN', $array)->get('ID_POSYANDU');
                if($posyanduFound->count()!=0){
                    $a=0;
                    foreach ($posyanduFound as $item){
                    $array[$a] = $item->ID_POSYANDU;
                    $a++;
                    }
                    $balita = Balita::whereIn('ID_POSYANDU', $array);
                }
            }
        } else
        if(request('kelurahan')){
            $status = 1;
            $statusKel = 1;
            $statusPos = 0;
            $statusKec = 0;
            $kelurahanFound = Kelurahan::where('KELURAHAN', request('kelurahan'))->first();
            $posyanduFound = Posyandu::where('ID_KELURAHAN', $kelurahanFound->ID_KELURAHAN)->get('ID_POSYANDU');
            if($posyanduFound->count()!=0){
                $a=0;
                foreach ($posyanduFound as $item){
                $array[$a] = $item->ID_POSYANDU;
                $a++;
                }
                $balita = Balita::whereIn('ID_POSYANDU', $array);
            }
        } else
        if(request('posyandu')){
            $status = 1;
            $statusPos = 1;
            $statusKec = 0;
            $statusKel = 0;
            $posyanduFound = Posyandu::where('NAMA_POSYANDU', request('posyandu'))->first();
            $balita = Balita::where('ID_POSYANDU', $posyanduFound->ID_POSYANDU);
        }
        
        return view('petugas/balita', ['kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan, 'posyandu'=>$posyandu, 'balita'=>$balita->get(), 'statusKec'=>$statusKec, 'statusKel'=>$statusKel, 'statusPos'=>$statusPos]);
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
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $posyandu = Posyandu::all();
        $balita = Balita::all();
        $hpos = Histori::latest();
        $status = 0;
        $statusKec = 0;
        $statusKel = 0;
        $statusPos = 0;
        if(request('kecamatan')){
            $status = 1;
            $statusKec = 1;
            $statusKel = 0;
            $statusPos = 0;
            $kecamatanFound = Kecamatan::where('KECAMATAN', request('kecamatan'))->first();
            $kelurahanFound = Kelurahan::where('ID_KECAMATAN', $kecamatanFound->ID_KECAMATAN)->get('ID_KELURAHAN');
            if($kelurahanFound->count()!=0){
                $a=0;
                foreach ($kelurahanFound as $item){
                $array[$a] = $item->ID_KELURAHAN;
                $a++;
                }
                $posyanduFound = Posyandu::whereIn('ID_KELURAHAN', $array)->get('ID_POSYANDU');
                if($posyanduFound->count()!=0){
                    $a=0;
                    foreach ($posyanduFound as $item){
                    $array[$a] = $item->ID_POSYANDU;
                    $a++;
                    }
                    $balita = Balita::whereIn('ID_POSYANDU', $array)->get('ID_BALITA');
                    if($balita->count()!=0){
                        $a=0;
                        foreach ($balita as $item){
                        $array[$a] = $item->ID_BALITA;
                        $a++;
                        }
                        $hpos = Histori::whereIn('ID_BALITA', $array);
                    }
                }
            }
        } else
        if(request('kelurahan')){
            $status = 1;
            $statusKel = 1;
            $statusPos = 0;
            $statusKec = 0;
            $kelurahanFound = Kelurahan::where('KELURAHAN', request('kelurahan'))->first();
            $posyanduFound = Posyandu::where('ID_KELURAHAN', $kelurahanFound->ID_KELURAHAN)->get('ID_POSYANDU');
            if($posyanduFound->count()!=0){
                $a=0;
                foreach ($posyanduFound as $item){
                $array[$a] = $item->ID_POSYANDU;
                $a++;
                }
                $balita = Balita::whereIn('ID_POSYANDU', $array)->get('ID_BALITA');
                if($balita->count()!=0){
                    $a=0;
                    foreach ($balita as $item){
                    $array[$a] = $item->ID_BALITA;
                    $a++;
                    }
                    $hpos = Histori::whereIn('ID_BALITA', $array);
                }
            }
        } else
        if(request('posyandu')){
            $status = 1;
            $statusPos = 1;
            $statusKec = 0;
            $statusKel = 0;
            $posyanduFound = Posyandu::where('NAMA_POSYANDU', request('posyandu'))->first();
            $balita = Balita::where('ID_POSYANDU', $posyanduFound->ID_POSYANDU)->get('ID_BALITA');
            $a=0;
            foreach ($balita as $item){
            $array[$a] = $item->ID_BALITA;
            $a++;
            }
            $hpos = Histori::whereIn('ID_BALITA', $array);
        }
        
        return view('petugas/hposyandu', ['kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan, 'posyandu'=>$posyandu, 'balita'=>$balita,'hpos'=>$hpos->get(), 'statusKec'=>$statusKec, 'statusKel'=>$statusKel, 'statusPos'=>$statusPos]);
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

    public function user(){
        $role = Role::where('ROLE', 'ORANGTUA')->first();
        $users = UserRole::where('ID_ROLE',$role->ID_ROLE)->get('ID_USER');
        //return $balita;
        $a=0;
        foreach ($users as $item){
        $array[$a] = $item->ID_USER;
        $a++;
        }
        $users = User::whereIn('id', $array)->get();
        //return view('master/posyandu');
        return view('petugas/user', ['users'=>$users]);
    }

    public function tambahUser(){
        return view('admin/tambah/user');
    }

    public function simpanUser(Request $request){
        $request->validate([
            'username' => 'required|unique:users|min:3|max:20',
            'password' => 'required',
        ]);
        $request->password = Hash::make($request->password);

        $user = new User;
        $user->USERNAME = $request->username;
        $user->PASSWORD = $request->password;
        if($user->save()){
            $userFound = User::where('username',$user->USERNAME)->first();
            $roleFound = Role::where('ROLE', 'ORANGTUA')->first();
            $userRole = new UserRole;
            $userRole->ID_USER = $userFound->id;
            $userRole->ID_ROLE = $roleFound->ID_ROLE;
            if ($userRole->save()){
                return redirect('/petugas-user')->with('success', 'Berhasil registrasi, silahkan login!');
            } else
            return back()->with('regisError', 'Registrasi gagal!');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function hapusUser(Request $request){
        //return $request;
        $user = User::where('id',$request->id);
        if($user->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function userRestore(){
        $role = Role::where('ROLE', 'ORANGTUA')->first();
        $users = UserRole::where('ID_ROLE',$role->ID_ROLE)->get('ID_USER');
        //return $balita;
        $a=0;
        foreach ($users as $item){
        $array[$a] = $item->ID_USER;
        $a++;
        }
        $user = User::whereIn('id', $array)->onlyTrashed()->get();
        return view('petugas/restore/user', ['user'=>$user]);
    }

    public function restoreUser(Request $request){
        $user = User::where('id',$request->id);
        if($user->restore()){
            return redirect('/petugas-user')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelUser(Request $request){
        //return $request;
        $user = User::where('id',$request->id);
        if($user->forceDelete()){
            return redirect('/petugas-user')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }
}
