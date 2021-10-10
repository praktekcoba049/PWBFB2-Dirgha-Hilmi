<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\DataMasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home-master', function () {
    return view('admin/master/home');
});

Route::get('/kecamatan', [DataMasController::class, 'kecamatan']);

Route::get('/kelurahan', [DataMasController::class, 'kelurahan']);

Route::get('/posyandu', [DataMasController::class, 'posyandu']);

Route::get('/role', function () {
    return view('admin/master/role');
});

Route::get('/balita', [DataMasController::class, 'balita']);

Route::get('/user', [DataMasController::class, 'user']);


//Tambah Data
Route::get('/tambah-kec', [DataMasController::class, 'tambahKec']);
Route::post('/kec-store', [DataMasController::class, 'dataKec']);

Route::get('/tambah-kel', [DataMasController::class, 'tambahKel']);
Route::post('/kel-store', [DataMasController::class, 'dataKel']);

Route::get('/tambah-pos', function () {
    return view('admin/master/tambah/posyandu');
});


//Edit Data
Route::get('/edit-kec', function () {
    return view('admin/master/edit/kecamatan');
});

Route::get('/edit-kel', function () {
    return view('admin/master/edit/kelurahan');
});

Route::get('/edit-pos', function () {
    return view('admin/master/edit/posyandu');
});


// Histori
Route::get('/hposyandu', [HistoriController::class, 'hpos']);

Route::get('/hbalita', [HistoriController::class, 'show']);

Route::get('/', function () {
    return view('LandPage/home');
});
