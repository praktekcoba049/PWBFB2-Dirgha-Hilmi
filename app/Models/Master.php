<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    public static function kec(){
        return $table = 'kecamatan';
    }
    
    protected $table2 = 'kelurahan';
    protected $table3 = 'posyandu';
    protected $table4 = 'role';
}
