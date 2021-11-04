<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    


    public static function tambah(){
        $idplus1=DB::table('kecamatan')->max('id_kecamatan');
        $idplus1=(int)$idplus1+1;
        return $idplus1;
    }
}
