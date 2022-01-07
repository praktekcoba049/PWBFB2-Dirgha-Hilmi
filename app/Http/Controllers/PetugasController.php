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
use App\Models\Masters\Ukur;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Carbon;

class PetugasController extends Controller
{
    public function index($user){
        $balita = Balita::where('ID_POSYANDU', Auth::user()->ID_POSYANDU)->get();
        return view('petugas/balita', ['balita'=>$balita]);
    }

    public function petugas(){
        return view('petugas/home');
    }
    
    public function balita(){
        $balita = Balita::where('ID_POSYANDU', Auth::user()->ID_POSYANDU)->get();
        
        return view('petugas/balita', ['balita'=>$balita]);
    }

    public function tambahBalita(){
        $posyandu = Posyandu::all();
        return view('petugas/aplikasi/balita', ['posyandu'=>$posyandu]);
    }

    public function simpanBalita(Request $request){
        $request->validate([
            'balita' => 'required|max:100',
            'NIK_orangtua' => 'required|min:16|max:16',
            'orangtua' => 'required|max:100',
            'tgl_lahir' => 'required',
            'jk' => 'required',
        ]);

        $balita = new Balita;
        $balita->ID_POSYANDU = Auth::user()->ID_POSYANDU;
        $balita->NAMA_BALITA = $request->balita;
        $balita->NIK_ORANG_TUA = $request->NIK_orangtua;
        $balita->NAMA_ORANG_TUA = $request->orangtua;
        $balita->TGL_LAHIR_BALITA = $request->tgl_lahir;
        $balita->JENIS_KELAMIN_BALITA = $request->jk;
        $balita->STATUS = 0;

        $user = new User;
        $user->USERNAME = $request->NIK_orangtua;
        $user->NAMA = $request->orangtua;
        $user->ID_POSYANDU = Auth::user()->ID_POSYANDU;
        $pass = $request->NIK_orangtua;
        $pass = Hash::make($pass);
        $user->PASSWORD = $pass;
        if ($userFind = User::where('username', $request->NIK_orangtua)->first()){
            if($balita->save()){
                return redirect('/petugas')->with('success', 'Data berhasil ditambahkan');
            } else
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
        if($user->save() && $balita->save()){
            $userFound = User::where('username',$user->USERNAME)->first();
            $roleFound = Role::where('ROLE', 'ORANGTUA')->first();
            $userRole = new UserRole;
            $userRole->ID_USER = $userFound->id;
            $userRole->ID_ROLE = $roleFound->ID_ROLE;
            if ($userRole->save()){
                return redirect('/petugas')->with('success', 'Data berhasil ditambahkan');
            } else
            return back()->with('tambahError', 'Data gagal ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editBalita(Request $request){
        $balita = Balita::where('ID_BALITA',$request->id)->first();
        return view('petugas/edit/balita', ['balita'=>$balita]);
    }

    public function updateBalita(Request $request){
        $request->validate([
            'balita' => 'required|max:100',
            'NIK_orangtua' => 'required|min:16|max:16',
            'orangtua' => 'required|max:100',
            'tgl_lahir' => 'required',
            'jk' => 'required',
        ]);

        $balita = Balita::where('ID_BALITA',$request->id);
        $user = User::where('USERNAME',$request->NIK_orangtua);
        if($balita->update([
            'ID_POSYANDU'=>Auth::user()->ID_POSYANDU,
            'NAMA_BALITA'=>$request->balita,
            'NIK_ORANG_TUA'=>$request->NIK_orangtua,
            'NAMA_ORANG_TUA'=>$request->orangtua,
            'TGL_LAHIR_BALITA'=>$request->tgl_lahir,
            'JENIS_KELAMIN_BALITA'=>$request->jk,
            'STATUS'=>$request->status
            ])
            &&
            $user->update([
                'USERNAME'=>$request->NIK_orangtua,
                'NAMA'=>$request->orangtua,
                'ID_POSYANDU'=>Auth::user()->ID_POSYANDU
            ])){
                return redirect('/petugas')->with('success', 'Data berhasil ditambahkan');
            }
        return back()->with('updateError', 'Data gagal ditambahkan');
    }

    public function hposyandu(){
        $balita = Balita::where('ID_POSYANDU', Auth::user()->ID_POSYANDU)->get('ID_BALITA');
        $a=0;
        foreach ($balita as $item){
        $array[$a] = $item->ID_BALITA;
        $a++;
        }
        $hpos = Histori::join('balita', 'balita.ID_BALITA', '=', 'history_posyandu.ID_BALITA')->whereIn('history_posyandu.ID_BALITA', $array);
        
        
        return view('petugas/hposyandu', ['balita'=>$balita,'hpos'=>$hpos->get()]);
    }

    public function tambahHpos(){
        $balita = Balita::where('ID_POSYANDU', Auth::user()->ID_POSYANDU);
        return view('petugas/aplikasi/hposyandu', ['balita'=>$balita]);
    }

    public function simpanHpos(Request $request){
        $request->validate([
            'id_balita' => 'required',
            'tgl_posyandu' => 'required',
            'berat' => 'required|max:5',
            'tinggi' => 'required|max:5',
        ]);

        $idUser = User::where('username', Auth::user()->username)->first();
        

        $hpos = new Histori;
        $hpos->ID_BALITA = $request->id_balita;
        $hpos->ID_USER = $idUser->id;
        $hpos->TGL_POSYANDU = $request->tgl_posyandu;
        $hpos->BERAT_BADAN_BALITA = $request->berat;
        $hpos->TINGGI_BADAN = $request->tinggi;

        $balita = Balita::where('ID_BALITA', $request->id_balita)->first();
        $tglLahir = $balita->TGL_LAHIR_BALITA;
        $tglLahir = date_create($tglLahir);
        $now = date_create($request->tgl_posyandu);
        $umur = date_diff($tglLahir, $now);
        $tahun = $umur->y;
        $bulan = $umur->m;
        $umur = ($tahun*12)+$bulan;

        $ukur = Ukur::where('UMUR', $umur)->first();

        $balita = Balita::where('ID_BALITA', $request->id_balita);
        if ($request->tinggi < $ukur->STUNTED){
            if ($request->tinggi < $ukur->SUVERELY_STUNTED){
                if($hpos->save() && $balita->update([
                    'STATUS'=>2
                    ])){
                    return redirect('/petugas')->with('success', 'Data berhasil ditambahkan');
                } else {
                    return back()->with('tambahError', 'Data gagal ditambahkan');
                }
            } else
            if($hpos->save() && $balita->update([
                'STATUS'=>1
                ])){
                return redirect('/petugas')->with('success', 'Data berhasil ditambahkan');
            } else {
                return back()->with('tambahError', 'Data gagal ditambahkan');
            }
        } else if($hpos->save() && $balita->update([
            'STATUS'=>0
            ])){
            return redirect('/petugas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
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
        $users = User::whereIn('id', $array)->where('ID_POSYANDU', Auth::user()->ID_POSYANDU)->get();
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
