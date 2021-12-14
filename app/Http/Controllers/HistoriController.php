<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Masters\Histori;
use App\Models\Masters\Posyandu;
use App\Models\Masters\Balita;

class HistoriController extends Controller
{
    public function hpos(){
        $hpos = Histori::all();
        //return $hpos;
        $posyandu = Posyandu::all();
        $posyanduNow = Posyandu::all()->first();
        $posyanduNow->ID_POSYANDU = 0;
        $posyanduNow->NAMA_POSYANDU = "- Pilih Posyandu -";
        return view('admin/master/hposyandu', ['hpos'=>$hpos, 'posyandu'=>$posyandu, 'posyanduNow'=>$posyanduNow]);
    }

    public function hposCari(Request $request){
        $balita = Balita::where('ID_POSYANDU',$request->ID_POSYANDU)->get('ID_BALITA');
        //return $balita;
        $a=0;
        foreach ($balita as $item){
        $array[$a] = $item->ID_BALITA;
        $a++;
        }
        //return $array;
        $hpos = Histori::whereIn('ID_BALITA', $array)->get();
        //return $hpos;
        $posyandu = Posyandu::all();
        $valuePost = $request->ID_POSYANDU;
        $posyanduNow = Posyandu::where('ID_POSYANDU',$valuePost)->first();
        return view('admin/master/hposyandu', ['hpos'=>$hpos, 'posyandu'=>$posyandu, 'posyanduNow'=>$posyanduNow]);
    }

    public function show(){
        return view('admin/master/hbalita');
    }
}
