<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    


    public static function tambah(){
        $idplus1=100000;
        $idplus1=(int)$idplus1+1;
        return $idplus1;
    }
}
