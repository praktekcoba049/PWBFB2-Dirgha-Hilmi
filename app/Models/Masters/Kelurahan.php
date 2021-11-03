<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable2 =[];
    public static function tambah1(){
        $idplus1=1000;
        $idplus1=(int)$idplus1+1;
        return $idplus1;
    }
}
