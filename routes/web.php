<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\DataMasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;

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

Route::get('/role', [DataMasController::class, 'role']);

Route::get('/balita', [DataMasController::class, 'balita']);

Route::get('/user', [DataMasController::class, 'user']);


//Tambah Data
Route::get('/tambah-kec', [DataMasController::class, 'tambahKec']);
Route::post('/kec-store', [DataMasController::class, 'dataKec']);

Route::get('/tambah-kel', [DataMasController::class, 'tambahKel']);
Route::post('/kel-store', [DataMasController::class, 'dataKel']);

Route::get('/tambah-pos', [DataMasController::class, 'tambahPos']);
Route::post('/pos-store', [DataMasController::class, 'dataPos']);

Route::get('/tambah-role', [DataMasController::class, 'tambahRole']);
Route::post('/role-store', [DataMasController::class, 'dataRole']);


//Edit Data
Route::post('/edit-kec', [DataMasController::class, 'editKec']);
Route::post('/kec-edit', [DataMasController::class, 'simpanKec']);

Route::post('/edit-kel', [DataMasController::class, 'editKel']);
Route::post('/kel-edit', [DataMasController::class, 'simpanKel']);

Route::post('/edit-pos', [DataMasController::class, 'editPos']);
Route::post('/pos-edit', [DataMasController::class, 'simpanPos']);

Route::post('/edit-role', [DataMasController::class, 'editRole']);
Route::post('/role-edit', [DataMasController::class, 'simpanRole']);

// Hapus
Route::post('/kec-hapus', [DataMasController::class, 'hapusKec'],[]);
Route::post('/kel-hapus', [DataMasController::class, 'hapusKel'],[]);
Route::post('/pos-hapus', [DataMasController::class, 'hapusPos'],[]);
Route::post('/role-hapus', [DataMasController::class, 'hapusRole'],[]);


// Histori
Route::get('/hposyandu', [HistoriController::class, 'hpos']);

Route::get('/hbalita', [HistoriController::class, 'show']);

Route::get('/', function () {
    return view('LandPage/home');
});

// Login
/*
Route::get('/login', function () {
    return view('login/login');
});
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'cekLogin']);
*/
Route::get('/login-admin', [LoginController::class, 'loginAdmin']);
Route::post('/admin-cek', [LoginController::class, 'adminCek']);

Route::get('/login-petugas', [LoginController::class, 'loginPetugas']);
Route::post('/petugas-cek', [LoginController::class, 'petugasCek']);

Route::get('/login-ortu', [LoginController::class, 'loginOrtu']);
Route::post('/ortu-cek', [LoginController::class, 'ortuCek']);


// registrasi
Route::get('/reg-petugas', [LoginController::class, 'regPetugas']);
Route::post('/reg-petugas', [LoginController::class, 'dataPetugas']);

Route::get('/reg-ortu', [LoginController::class, 'regOrtu']);
Route::post('/reg-ortu', [LoginController::class, 'dataOrtu']);



// Petugas
Route::get('/petugas', function () {
    return view('petugas/home');
});

/*Route::get('/petugas/balita', function () {
    return view('petugas/balita');
});*/
Route::get('/petugas-balita', [PetugasController::class, 'balita']);

Route::get('/petugas-hposyandu', [PetugasController::class, 'hposyandu']);

//Petugas Tambah Data
Route::get('/petugas-balita-tambah', [PetugasController::class, 'tambahBalita']);
Route::post('/petugas-balita-simpan', [PetugasController::class, 'simpanBalita']);

Route::get('/petugas-hposyandu-tambah', [PetugasController::class, 'tambahHpos']);
Route::post('/petugas-hposyandu-simpan', [PetugasController::class, 'simpanHpos']);
