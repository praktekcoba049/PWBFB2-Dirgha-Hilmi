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

Route::get('/balita', function () {
    return view('admin/master/balita');
});

Route::get('/user', function () {
    return view('admin/master/user');
});


//Tambah Data
Route::get('/tambah-kec', function () {
    return view('admin/master/tambah/kecamatan');
});

Route::get('/tambah-kel', function () {
    return view('admin/master/tambah/kelurahan');
});

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
