<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Histori;

class HistoriController extends Controller
{
    public function hpos(){
        $hpos = Histori::all();
        return view('admin/master/hposyandu', ['hpos'=>$hpos]);
    }

    public function show(){
        return view('admin/master/hbalita');
    }
}
