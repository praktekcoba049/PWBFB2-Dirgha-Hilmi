<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masters\Pengguna;
use App\Models\Masters\Role;
use App\Models\Masters\UserRole;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function registrasi(){
        return view('login/registrasi');
    }

    public function dataUser(Request $request){
        $user = new Pengguna;
        if($request->password1 == $request->password2){
            $user->USERNAME = $request->username;
            $user->PASSWORD = $request->password1;
            if($user->save()){
                echo "
                <script>
                    document.location.href = '/login';
                    alert('Data berhasil ditambahkan');
                </script>
                ";
            } else {
                echo "
                <script>
                    document.location.href = '/registrasi';
                    alert('Data gagal ditambahkan');
                </script>
                ";
            }
        }else {
            echo "
                <script>
                    document.location.href = '/registrasi';
                    alert('Password yang dimasukkan tidak sama');
                </script>
            ";
        }
    }

    public function login(){
        return view('login/login');
    }

    public function cekLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home-master');
        }

        return back()->with(
            'loginError', 'Login Failed!',
        );
    }

}
