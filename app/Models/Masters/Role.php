<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Role extends Model
{
    //use SoftDeletes;
    protected $table = 'role';

    public static function tambah3(){
        $idplus1=DB::table('role')->max('id_role');
        $idplus1=(int)$idplus1+1;
        return $idplus1;
    }

}
