<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masters\Histori;
use App\Models\Masters\Balita;

class OrangtuaController extends Controller
{
    public function index(){
        $hpos = Histori::latest();
        $status = 0;
        if(request('nik')){
            $status = 1;
            $balita = Balita::where('NIK_ORANG_TUA',request('nik'))->first();
            $hpos->where('ID_BALITA', $balita->ID_BALITA);
        }
        
        return view('ortu/home', ['hpos'=>$hpos->get(), 'status'=>$status]);
    }

    public function hposCari(Request $request){
        if ($balita = Balita::where('NIK_ORANG_TUA',$request->nik)->first()){
            $status = 1;
            $hpos = Histori::where('ID_BALITA', $balita->ID_BALITA)->get();
            $valueNIK = $request->nik;
            return view('ortu/home', ['hpos'=>$hpos, 'valueNIK'=>$valueNIK, 'status'=>$status]);
        }

        if ($balita = Balita::where('NIK_ORANG_TUA',$request->nik)->first()){
            $status = 1;
            $hpos = Histori::where('ID_BALITA', $balita->ID_BALITA)->get();
            $valueNIK = $request->nik;
            return view('ortu/home', ['hpos'=>$hpos, 'valueNIK'=>$valueNIK, 'status'=>$status]);
        }
    }
}
