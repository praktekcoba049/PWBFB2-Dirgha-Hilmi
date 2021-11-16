<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masters\Pengguna;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Role;
use App\Models\Masters\UserRole;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function regPetugas(){
        $posyandu = Posyandu::all();
        return view('login/petugas/registrasi', ['posyandu'=>$posyandu]);
    }

    public function dataPetugas(Request $request){
        $user = new Pengguna;
        if($request->password1 == $request->password2){
            $user->ID_POSYANDU = $request->id_posyandu;
            $user->USERNAME = $request->username;
            $user->PASSWORD = $request->password1;
            if($user->save()){
                echo "
                <script>
                    document.location.href = '/login-petugas';
                    alert('Data berhasil ditambahkan');
                </script>
                ";
            } else {
                echo "
                <script>
                    document.location.href = '/reg-petugas';
                    alert('Data gagal ditambahkan');
                </script>
                ";
            }
        }else {
            echo "
                <script>
                    document.location.href = '/reg-petugas';
                    alert('Password yang dimasukkan tidak sama');
                </script>
            ";
        }
    }

    public function loginPetugas(){
        return view('login/petugas/login');
    }

    public function petugasCek(Request $request){
        $user = Pengguna::where('username',$request->username)->first();
        return view('petugas/home');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'USERNAME' => 'required',
            'PASSWORD' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home-master');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function loginAdmin(){
        return view('login/admin/login');
    }

    public function adminCek(Request $request){
        $user = Pengguna::where('username',$request->username)->first();
        return redirect('/home-master');
    }

    public function regOrtu(){
        $posyandu = Posyandu::all();
        return view('login/ortu/registrasi', ['posyandu'=>$posyandu]);
    }

    public function dataOrtu(Request $request){
        $user = new Pengguna;
        if($request->password1 == $request->password2){
            $user->ID_POSYANDU = $request->id_posyandu;
            $user->USERNAME = $request->username;
            $user->PASSWORD = $request->password1;
            if($user->save()){
                echo "
                <script>
                    document.location.href = '/login-ortu';
                    alert('Data berhasil ditambahkan');
                </script>
                ";
            } else {
                echo "
                <script>
                    document.location.href = '/reg-ortu';
                    alert('Data gagal ditambahkan');
                </script>
                ";
            }
        }else {
            echo "
                <script>
                    document.location.href = '/reg-ortu';
                    alert('Password yang dimasukkan tidak sama');
                </script>
            ";
        }
    }

    public function loginOrtu(){
        return view('login/ortu/login');
    }

    public function ortuCek(Request $request){
        $user = Pengguna::where('username',$request->username)->first();
        return view('ortu/home');
    }

}
