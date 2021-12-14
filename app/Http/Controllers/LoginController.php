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
    public function regPetugas(){
        $posyandu = Posyandu::all();
        return view('login/petugas/registrasi', ['posyandu'=>$posyandu]);
    }

    public function dataPetugas(Request $request){
        $request->validate([
            'username' => 'required|unique:users|min:4',
            'password' => 'required|min:5|max:255',
        ]);
        
        $request->password = Hash::make($request->password);

        $user = new User;
        $user->USERNAME = $request->username;
        $user->PASSWORD = $request->password;
        if ($user->save()){
            $userFound = User::where('username',$user->USERNAME)->first();
            $role = Role::where('ROLE','PETUGAS')->first();
            $userRole = new UserRole;
            $userRole->ID_USER = $userFound->id;
            $userRole->ID_ROLE = $role->ID_ROLE;
            if ($userRole->save()){
                return redirect('/login-petugas')->with('success', 'Berhasil registrasi, silahkan login!');
            } else
            return back()->with('regisError', 'Registrasi gagal!');
        }
        return back()->with('regisError', 'Registrasi gagal!');
    }

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

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'USERNAME' => 'required',
            'PASSWORD' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/petugas');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function regAdmin(){
        return view('login/admin/registrasi');
    }

    public function dataAdmin(Request $request){
        $request->validate([
                'username' => 'required|unique:users|min:4',
                'password' => 'required|min:5|max:255',
        ]);
        
        $request->password = Hash::make($request->password);

        $user = new User;
        $user->USERNAME = $request->username;
        $user->PASSWORD = $request->password;
        if ($user->save()){
            $userFound = User::where('username',$user->USERNAME)->first();
            $role = Role::where('ROLE','ADMIN')->first();
            $userRole = new UserRole;
            $userRole->ID_USER = $userFound->id;
            $userRole->ID_ROLE = $role->ID_ROLE;
            if ($userRole->save()){
                return redirect('/login-admin')->with('success', 'Berhasil registrasi, silahkan login!');
            } else
            return back()->with('regisError', 'Registrasi gagal!');
        }
        return back()->with('regisError', 'Registrasi gagal!');
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

    public function regOrtu(){
        $posyandu = Posyandu::all();
        return view('login/ortu/registrasi', ['posyandu'=>$posyandu]);
    }

    public function dataOrtu(Request $request){
        $request->validate([
            'username' => 'required|unique:users|min:4',
            'password' => 'required|min:5|max:255',
        ]);
        
        $request->password = Hash::make($request->password);

        $user = new User;
        $user->USERNAME = $request->username;
        $user->PASSWORD = $request->password;
        if ($user->save()){
            $userFound = User::where('username',$user->USERNAME)->first();
            $role = Role::where('ROLE','ORANGTUA')->first();
            $userRole = new UserRole;
            $userRole->ID_USER = $userFound->id;
            $userRole->ID_ROLE = $role->ID_ROLE;
            if ($userRole->save()){
                return redirect('/login-ortu')->with('success', 'Berhasil registrasi, silahkan login!');
            } else
            return back()->with('regisError', 'Registrasi gagal!');
        }
        return back()->with('regisError', 'Registrasi gagal!');
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
        $userRoleFound = UserRole::where('ID_USER',$userFound->id)->first();
        $roleFound = Role::where('ROLE','ORANGTUA')->first();
        if ($userRoleFound->ID_ROLE == $roleFound->ID_ROLE){
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->intended('/orangtua');
            } else
            return back()->with('loginError', 'Login gagal');
        } else
        return back()->with('loginError', 'Anda bukan orang tua balita');
        } else 
        return back()->with('loginError', 'Login gagal');
    }

    public function registrasi(){
        $posyandu = Posyandu::all();
        return view('login/registrasi', ['posyandu'=>$posyandu]);
    }

    public function register(Request $request){
        $request->validate([
                'username' => 'required|unique:users|min:4',
                'password' => 'required|min:5|max:255',
        ]);
        
        $request->password = Hash::make($request->password);

        $user = new User;
        $user->USERNAME = $request->username;
        $user->PASSWORD = $request->password;
        if ($user->save()){
            return redirect('/login')->with('success', 'Berhasil registrasi, silahkan login!');
        }
        return back()->with('regisError', 'Registrasi gagal!');
    }

    public function login(){
        return view('login/login');
    }

    public function cekLogin(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home-master');
        }

        return back()->with('loginError', 'Login gagal');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
