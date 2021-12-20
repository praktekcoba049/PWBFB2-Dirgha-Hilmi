<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Masters\UserRole;
use App\Models\Masters\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Role::where('ROLE', 'ADMIN')->first();
        $userRole = UserRole::where('ID_ROLE',$role->ID_ROLE)->get('ID_USER');
        $a=0;
        foreach ($userRole as $item){
        $idUser[$a] = $item->ID_USER;
        $a++;
        }
        $users = User::whereIn('id', $idUser)->get('username');
        $a=0;
        foreach ($users as $item){
        $array[$a] = $item->username;
        $a++;
        }
        if(auth()->check() || in_array(Auth::user()->username, $array)){
            return $next($request);
        } else abort(403);
    }
}
