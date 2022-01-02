<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Masters\Pengguna;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Role;
use App\Models\Masters\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function loginPetugas(){
        return view('login/petugas/login');
    }

    public function petugasCek(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($userFound = User::where('username',$request->username)->first()){
        $userRoleFound = UserRole::where('ID_USER',$userFound->id)->first();
        $roleFound = Role::where('ROLE','PETUGAS')->first();
        if ($userRoleFound->ID_ROLE == $roleFound->ID_ROLE){
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('/petugas');
            } else
            return back()->with('loginError', 'Login gagal');
        } else
        return back()->with('loginError', 'Anda bukan petugas');
        } else 
        return back()->with('loginError', 'Login gagal');
    }

    public function loginAdmin(){
        return view('login/admin/login');
    }

    public function adminCek(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($userFound = User::where('username',$request->username)->first()){
        $userRoleFound = UserRole::where('ID_USER',$userFound->id)->first();
        $roleFound = Role::where('ROLE','ADMIN')->first();
        if ($userRoleFound->ID_ROLE == $roleFound->ID_ROLE){
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('/home-master');
            } else
            return back()->with('loginError', 'Login gagal');
        } else
        return back()->with('loginError', 'Anda bukan admin super');
        } else 
        return back()->with('loginError', 'Login gagal');
    }

    public function loginOrtu(){
        return view('login/ortu/login');
    }

    public function ortuCek(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($userFound = User::where('username',$request->username)->first()){
        //return $userFound;
        $userRoleFound = UserRole::where('ID_USER',$userFound->id)->first();
        //return $userRoleFound;
        $roleFound = Role::where('ROLE','ORANGTUA')->first();
        if ($userRoleFound->ID_ROLE == $roleFound->ID_ROLE){
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('/orangtua-balita');
            } else
            return back()->with('loginError', 'Login gagal');
        } else
        return back()->with('loginError', 'Anda bukan orang tua balita');
        } else 
        return back()->with('loginError', 'Login gagal');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
