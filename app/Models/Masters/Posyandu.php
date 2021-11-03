<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $table = 'posyandu';

    protected $fillable = ['alamat_posyandu'];
    public static function tambah2(){
        $idplus1=100000000;
        $idplus1=(int)$idplus1+1;
        return $idplus1;
    }
}
