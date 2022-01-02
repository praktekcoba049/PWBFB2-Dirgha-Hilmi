<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Masters\Role;
use App\Models\Masters\UserRole;
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
        if(! auth()->guest()){
            $idUser = Auth::user()->id;
            $userRole = UserRole::where('ID_USER',$idUser)->first();
            $role = Role::where('ROLE', 'ADMIN')->first();
            if($userRole->ID_ROLE == $role->ID_ROLE){
                return $next($request);
            }
            return back();
        }
        return back();
    }
}
