<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable2 =[];
    public static function tambah1(){
        $idplus1=DB::table('kelurahan')->max('id_kelurahan');
        $idplus1=(int)$idplus1+1;
        return $idplus1;
        
    }
}
