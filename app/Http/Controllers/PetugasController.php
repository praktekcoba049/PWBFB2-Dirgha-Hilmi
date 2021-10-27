<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Histori;
use App\Models\Masters\Balita;

class PetugasController extends Controller
{
    public function balita(){
        $balita = Balita::all();
        return view('petugas/balita', ['balita'=>$balita]);
    }

    public function show(){
        return view('admin/master/hbalita');
    }
}
