<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use SoftDeletes;
    protected $table = 'kelurahan';

    public function kecamatan(){
    	return $this->belongsTo(Kecamatan::class, 'ID_KECAMATAN', 'ID_KECAMATAN');
    }
}
