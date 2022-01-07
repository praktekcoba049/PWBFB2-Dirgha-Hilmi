<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masters\Kecamatan;
use App\Models\Masters\Kelurahan;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Balita;
use App\Models\Masters\UserRole;
use App\Models\Masters\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Masters\Histori;

class DataMasController extends Controller
{
    public function homeMaster(){
        $balita = Balita::all();
        $balitaStunt = Balita::where('STATUS', 2)->distinct('ID_POSYANDU')->get('ID_POSYANDU');
        $a = 0;
        foreach ($balitaStunt as $item){
            $array[$a] = $item->ID_POSYANDU;
            $a++;
        }
        
        $posyandu = Posyandu::whereIn('ID_POSYANDU', $array)->get();
        //return $posyandu;
        return view('admin/master/home', ['balita'=>$balita , 'posyandu'=>$posyandu]);
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
        $request->validate([
            'kecamatan' => 'required|max:100',
        ]);

        $kecamatan = new Kecamatan;
        $kecamatan->KECAMATAN = $request->kecamatan;
        if($kecamatan->save()){
            return redirect('/kecamatan')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editKec(Request $request){
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id)->first();
        return view('admin/master/edit/kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function simpanKec(Request $request){
        $request->validate([
            'kecamatan' => 'required|max:100',
        ]);

        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->update([
            'KECAMATAN'=>$request->kecamatan
            ])){
            return redirect('/kecamatan')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusKec(Request $request){
        //return $request;
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function kecamatanRestore(){
        $kecamatan = Kecamatan::onlyTrashed()->get();
        return view('admin/master/restore/kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function restoreKecamatan(Request $request){
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->restore()){
            return redirect('/kecamatan')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelKecamatan(Request $request){
        //return $request;
        $kecamatan = Kecamatan::where('ID_KECAMATAN',$request->id);
        if($kecamatan->forceDelete()){
            return redirect('/kecamatan')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function kelurahan(){

        $kelurahan = Kelurahan::join('kecamatan', 'kecamatan.ID_KECAMATAN', '=', 'kelurahan.ID_KECAMATAN')
                     ->where('kecamatan.DELETED_AT', NULL)
                     ->get();
        //die(var_dump($kelurahan));
        return view('admin/master/kelurahan', ['kelurahan'=>$kelurahan]);
    }

    public function tambahKel(){
        $kecamatan = Kecamatan::all();
        return view('admin/master/tambah/kelurahan', ['kecamatan'=>$kecamatan]);
    }

    public function dataKel(Request $request){
        $request->validate([
            'ID_KECAMATAN' => 'required',
            'kelurahan' => 'required|max:100',
        ]);

        $kelurahan = new Kelurahan;
        $kelurahan->ID_KECAMATAN = $request->ID_KECAMATAN;
        $kelurahan->KELURAHAN = $request->kelurahan;
        
        if($kelurahan->save()){
            return redirect('/kelurahan')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editKel(Request $request){
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::join('kecamatan', 'kecamatan.ID_KECAMATAN', '=', 'kelurahan.ID_KECAMATAN')
                     ->where('kelurahan.ID_KELURAHAN',$request->id)->first();
        return view('admin/master/edit/kelurahan', ['kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan]);
    }

    public function simpanKel(Request $request){
        $request->validate([
            'ID_KECAMATAN' => 'required',
            'kelurahan' => 'required|max:100',
        ]);
        
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->update([
            'ID_KECAMATAN'=>$request->ID_KECAMATAN,
            'KELURAHAN'=>$request->kelurahan
            ])){
            return redirect('/kelurahan')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusKel(Request $request){
        //return $request;
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function kelurahanRestore(){
        $kelurahan = Kelurahan::join('kecamatan', 'kecamatan.ID_KECAMATAN', '=', 'kelurahan.ID_KECAMATAN')
                     ->onlyTrashed()->get();
        return view('admin/master/restore/kelurahan', ['kelurahan'=>$kelurahan]);
    }

    public function restoreKelurahan(Request $request){
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->restore()){
            return redirect('/kelurahan')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelKelurahan(Request $request){
        //return $request;
        $kelurahan = Kelurahan::where('ID_KELURAHAN',$request->id);
        if($kelurahan->forceDelete()){
            return redirect('/kelurahan')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function posyandu(){
        $posyandu = Posyandu::join('kelurahan', 'kelurahan.ID_KELURAHAN', '=', 'posyandu.ID_KELURAHAN')
                    ->join('kecamatan', 'kecamatan.ID_KECAMATAN', '=', 'kelurahan.ID_KECAMATAN')
                    ->where('kecamatan.DELETED_AT', NULL)->orWhere('kelurahan.DELETED_AT', NULL)
                    ->get();
        //return view('master/posyandu');
        return view('admin/master/posyandu', ['posyandu'=>$posyandu]);
    }

    public function tambahPos(){
        $kelurahan = Kelurahan::all();
        return view('admin/master/tambah/posyandu', ['kelurahan'=>$kelurahan]);
    }

    public function dataPos(Request $request){
        $request->validate([
            'ID_KELURAHAN' => 'required',
            'posyandu' => 'required|max:100',
            'alamat' => 'required|max:100',
        ]);
        $kelurahan = Kelurahan::where('ID_KELURAHAN', $request->ID_KELURAHAN)->first();
        $kecamatan = Kecamatan::where('ID_KECAMATAN', $kelurahan->ID_KECAMATAN)->first();
        $posyandu = new Posyandu;
        $posyandu->ID_KELURAHAN = $request->ID_KELURAHAN;
        $posyandu->NAMA_POSYANDU = $request->posyandu.', Kel. '.$kelurahan->KELURAHAN.', Kec. '.$kecamatan->KECAMATAN;
        $posyandu->ALAMAT_POSYANDU = $request->alamat.', Kel. '.$kelurahan->KELURAHAN.', Kec. '.$kecamatan->KECAMATAN;
        if($posyandu->save()){
            return redirect('/posyandu')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editPos(Request $request){
        $kelurahan = Kelurahan::all();
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id)->first();
        return view('admin/master/edit/posyandu', ['kelurahan'=>$kelurahan, 'posyandu'=>$posyandu]);
    }

    public function simpanPos(Request $request){
        $request->validate([
            'ID_KELURAHAN' => 'required',
            'posyandu' => 'required|max:100',
            'alamat' => 'required|max:100',
        ]);
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->update([
            'ID_KELURAHAN'=>$request->ID_KELURAHAN,
            'NAMA_POSYANDU'=>$request->posyandu,
            'ALAMAT_POSYANDU'=>$request->alamat
            ])){
            return redirect('/posyandu')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusPos(Request $request){
        //return $request;
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function posyanduRestore(){
        $posyandu = Posyandu::onlyTrashed()->get();
        return view('admin/master/restore/posyandu', ['posyandu'=>$posyandu]);
    }

    public function restorePosyandu(Request $request){
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->restore()){
            return redirect('/posyandu')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelPosyandu(Request $request){
        //return $request;
        $posyandu = Posyandu::where('ID_POSYANDU',$request->id);
        if($posyandu->forceDelete()){
            return redirect('/posyandu')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
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
        $request->validate([
            'role' => 'required|max:100',
        ]);
        $role = new Role;
        $role->ROLE = $request->role;
        if($role->save()){
            return redirect('/role')->with('tambahSuccess', 'Data berhasil ditambahkan');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editRole(Request $request){
        $role = Role::where('ID_ROLE',$request->id)->first();
        return view('admin/master/edit/role', ['role'=>$role]);
    }

    public function simpanRole(Request $request){
        $request->validate([
            'role' => 'required|max:100',
        ]);
        $role = Role::where('ID_ROLE',$request->id);
        if($role->update([
            'ROLE'=>$request->role
            ])){
            return redirect('/role')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
        }
    }

    public function hapusRole(Request $request){
        //return $request;
        $role = Role::where('ID_ROLE',$request->id);
        if($role->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function roleRestore(){
        $role = Role::onlyTrashed()->get();
        return view('admin/master/restore/role', ['role'=>$role]);
    }

    public function restoreRole(Request $request){
        $role = Role::where('ID_ROLE',$request->id);
        if($role->restore()){
            return redirect('/role')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelRole(Request $request){
        //return $request;
        $role = Role::where('ID_ROLE',$request->id);
        if($role->forceDelete()){
            return redirect('/role')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
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
        
        return view('admin/master/balita', ['kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan, 'posyandu'=>$posyandu, 'balita'=>$balita->get(), 'status'=>$status, 'statusKec'=>$statusKec, 'statusKel'=>$statusKel, 'statusPos'=>$statusPos]);
    }

    public function hapusBalita(Request $request){
        //return $request;
        $balita = Balita::where('ID_BALITA',$request->id);
        if($balita->delete()){
            return back()->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function balitaRestore(){
        $balita = Balita::onlyTrashed()->get();
        return view('admin/master/restore/balita', ['balita'=>$balita]);
    }

    public function restoreBalita(Request $request){
        $balita = Balita::where('ID_BALITA',$request->id);
        if($balita->restore()){
            return redirect('/balita')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelBalita(Request $request){
        //return $request;
        $balita = Balita::where('ID_BALITA',$request->id);
        if($balita->forceDelete()){
            return redirect('/balita')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function user(){
        $users = User::all();
        //return view('master/posyandu');
        return view('admin/master/user', ['users'=>$users]);
    }

    public function tambahUser(){
        $posyandu = Posyandu::all();
        return view('admin/master/tambah/user', ['posyandu'=>$posyandu]);
    }

    public function dataUser(Request $request){
        $request->validate([
            'id_posyandu' => 'required',
            'username' => 'required|unique:users|min:3|max:20',
            'nama' => 'required',
            'password' => 'required',
        ]);
        $request->password = Hash::make($request->password);

        $user = new User;
        $user->USERNAME = $request->username;
        $user->NAMA = $request->nama;
        $user->ID_POSYANDU = $request->id_posyandu;
        $user->PASSWORD = $request->password;
        if($user->save()){
            $userFound = User::where('username',$user->USERNAME)->first();
            $userRole = new UserRole;
            $userRole->ID_USER = $userFound->id;
            $userRole->ID_ROLE = 2;
            if ($userRole->save()){
                return redirect('/user')->with('success', 'Berhasil registrasi, silahkan login!');
            } else
            return back()->with('regisError', 'Registrasi gagal!');
        } else {
            return back()->with('tambahError', 'Data gagal ditambahkan');
        }
    }

    public function editUser(Request $request){
        $role = Role::where('ID_ROLE',$request->id)->first();
        return view('admin/master/edit/role', ['role'=>$role]);
    }

    public function simpanUser(Request $request){
        $request->validate([
            'role' => 'required|max:100',
        ]);
        $role = Role::where('ID_ROLE',$request->id);
        if($role->update([
            'ROLE'=>$request->role
            ])){
            return redirect('/role')->with('updateSuccess', 'Data berhasil dirubah');
        } else {
            return back()->with('updateError', 'Data gagal dirubah');
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
        $user = User::onlyTrashed()->get();
        return view('admin/master/restore/user', ['user'=>$user]);
    }

    public function restoreUser(Request $request){
        $user = User::where('id',$request->id);
        if($user->restore()){
            return redirect('/user')->with('restoreSuccess', 'Data berhasil dikembalikan');
        } else {
            return back()->with('restoreError', 'Data gagal dikembalikan');
        }
    }

    public function forceDelUser(Request $request){
        //return $request;
        $user = User::where('id',$request->id);
        if($user->forceDelete()){
            return redirect('/user')->with('deleteSuccess', 'Data berhasil dihapus');
        } else {
            return back()->with('deleteError', 'Data gagal dihapus');
        }
    }

    public function hposyandu(){
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $posyandu = Posyandu::all();
        $hpos = Histori::join('balita', 'balita.ID_BALITA', '=', 'history_posyandu.ID_BALITA');
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
                        $hpos = Histori::join('balita', 'balita.ID_BALITA', '=', 'history_posyandu.ID_BALITA')->whereIn('history_posyandu.ID_BALITA', $array);
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
                    $hpos = Histori::join('balita', 'balita.ID_BALITA', '=', 'history_posyandu.ID_BALITA')->whereIn('history_posyandu.ID_BALITA', $array);
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
            $hpos = Histori::join('balita', 'balita.ID_BALITA', '=', 'history_posyandu.ID_BALITA')->whereIn('history_posyandu.ID_BALITA', $array);
        }
        
        return view('admin/master/hposyandu', ['kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan, 'posyandu'=>$posyandu, 'hpos'=>$hpos->get(), 'statusKec'=>$statusKec, 'statusKel'=>$statusKel, 'statusPos'=>$statusPos]);
    }
}
