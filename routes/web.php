<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\DataMasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\OrangtuaController;

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

Route::get('/home-master', [DataMasController::class, 'homeMaster'])->middleware('auth', 'admin');

Route::get('/kecamatan', [DataMasController::class, 'kecamatan'])->middleware('auth', 'admin');

Route::get('/kelurahan', [DataMasController::class, 'kelurahan'])->middleware('auth', 'admin');

Route::get('/posyandu', [DataMasController::class, 'posyandu'])->middleware('auth', 'admin');

Route::get('/role', [DataMasController::class, 'role'])->middleware('auth', 'admin');

Route::get('/balita', [DataMasController::class, 'balita'])->middleware('auth', 'admin');

Route::get('/user', [DataMasController::class, 'user'])->middleware('auth', 'admin');

Route::get('/hposyandu', [DataMasController::class, 'hposyandu'])->middleware('auth', 'admin');


//Tambah Data
Route::get('/tambah-kec', [DataMasController::class, 'tambahKec'])->middleware('auth', 'admin');
Route::post('/kec-store', [DataMasController::class, 'dataKec']);

Route::get('/tambah-kel', [DataMasController::class, 'tambahKel'])->middleware('auth', 'admin');
Route::post('/kel-store', [DataMasController::class, 'dataKel']);

Route::get('/tambah-pos', [DataMasController::class, 'tambahPos'])->middleware('auth', 'admin');
Route::post('/pos-store', [DataMasController::class, 'dataPos']);

Route::get('/tambah-role', [DataMasController::class, 'tambahRole'])->middleware('auth', 'admin');
Route::post('/role-store', [DataMasController::class, 'dataRole']);

Route::get('/tambah-user', [DataMasController::class, 'tambahUser'])->middleware('auth', 'admin');
Route::post('/user-store', [DataMasController::class, 'dataUser']);


//Edit Data
Route::post('/edit-kec', [DataMasController::class, 'editKec']);
Route::post('/kec-edit', [DataMasController::class, 'simpanKec']);

Route::post('/edit-kel', [DataMasController::class, 'editKel']);
Route::post('/kel-edit', [DataMasController::class, 'simpanKel']);

Route::post('/edit-pos', [DataMasController::class, 'editPos']);
Route::post('/pos-edit', [DataMasController::class, 'simpanPos']);

Route::post('/edit-role', [DataMasController::class, 'editRole']);
Route::post('/role-edit', [DataMasController::class, 'simpanRole']);

Route::post('/edit-balita', [DataMasController::class, 'editBalita']);
Route::post('/balita-edit', [DataMasController::class, 'simpanBalita']);

// Hapus
Route::post('/kec-hapus', [DataMasController::class, 'hapusKec'],[]);
Route::post('/kel-hapus', [DataMasController::class, 'hapusKel'],[]);
Route::post('/pos-hapus', [DataMasController::class, 'hapusPos'],[]);
Route::post('/role-hapus', [DataMasController::class, 'hapusRole'],[]);
Route::post('/balita-hapus', [DataMasController::class, 'hapusBalita'],[]);
Route::post('/user-hapus', [DataMasController::class, 'hapusUser'],[]);

// Restore
Route::get('/kecamatan-restore', [DataMasController::class, 'kecamatanRestore'])->middleware('auth', 'admin');
Route::post('/restore-kecamatan', [DataMasController::class, 'restoreKecamatan']);
Route::post('/delete-permanent-kecamatan', [DataMasController::class, 'forceDelKecamatan']);

Route::get('/kelurahan-restore', [DataMasController::class, 'kelurahanRestore'])->middleware('auth', 'admin');
Route::post('/restore-kelurahan', [DataMasController::class, 'restoreKelurahan']);
Route::post('/delete-permanent-kelurahan', [DataMasController::class, 'forceDelKelurahan']);

Route::get('/posyandu-restore', [DataMasController::class, 'posyanduRestore'])->middleware('auth', 'admin');
Route::post('/restore-posyandu', [DataMasController::class, 'restorePosyandu']);
Route::post('/delete-permanent-posyandu', [DataMasController::class, 'forceDelPosyandu']);

Route::get('/role-restore', [DataMasController::class, 'roleRestore'])->middleware('auth', 'admin');
Route::post('/restore-role', [DataMasController::class, 'restoreRole']);
Route::post('/delete-permanent-role', [DataMasController::class, 'forceDelRole']);

Route::get('/balita-restore', [DataMasController::class, 'balitaRestore'])->middleware('auth', 'admin');
Route::post('/restore-balita', [DataMasController::class, 'restoreBalita']);
Route::post('/delete-permanent-balita', [DataMasController::class, 'forceDelBalita']);

Route::get('/user-restore', [DataMasController::class, 'userRestore'])->middleware('auth', 'admin');
Route::post('/restore-user', [DataMasController::class, 'restoreUser']);
Route::post('/delete-permanent-user', [DataMasController::class, 'forceDelUser']);

//Land Page
Route::get('/', function () {
    return view('LandPage/home');
})->name('home');

// Login
Route::get('/login-admin', [LoginController::class, 'loginAdmin'])->middleware('guest');
Route::post('/admin-cek', [LoginController::class, 'adminCek']);

Route::get('/login-petugas', [LoginController::class, 'loginPetugas'])->middleware('guest');
Route::post('/petugas-cek', [LoginController::class, 'petugasCek']);

Route::get('/login-ortu', [LoginController::class, 'loginOrtu'])->middleware('guest');
Route::post('/ortu-cek', [LoginController::class, 'ortuCek']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);


// Petugas
Route::get('/petugas', [PetugasController::class, 'petugas'])->middleware('auth', 'petugas');

Route::get('/petugas-balita', [PetugasController::class, 'balita'])->middleware('auth', 'petugas');

Route::get('/petugas-hposyandu', [PetugasController::class, 'hposyandu'])->middleware('auth', 'petugas');

Route::get('/petugas-user', [PetugasController::class, 'user'])->middleware('auth', 'petugas');

//Petugas Tambah Data
Route::get('/petugas-balita-tambah', [PetugasController::class, 'tambahBalita'])->middleware('auth', 'petugas');
Route::post('/petugas-balita-simpan', [PetugasController::class, 'simpanBalita']);

Route::get('/petugas-hposyandu-tambah', [PetugasController::class, 'tambahHpos'])->middleware('auth', 'petugas');
Route::post('/petugas-hposyandu-simpan', [PetugasController::class, 'simpanHpos']);

//Petugas Edit
Route::post('/petugas-balita-edit', [PetugasController::class, 'editBalita'])->middleware('auth', 'petugas');
Route::post('/petugas-balita-update', [PetugasController::class, 'updateBalita']);

//Petugas Restore Data
Route::get('/petugas-user-restore', [PetugasController::class, 'userRestore'])->middleware('auth', 'petugas');
Route::post('/petugas-restore-user', [PetugasController::class, 'restoreUser']);
Route::post('/petugas-delete-permanent-user', [PetugasController::class, 'forceDelUser']);

// Orang Tua
Route::get('/orangtua-balita', [OrangtuaController::class, 'index'])->middleware('auth', 'orangtua');
Route::post('/orangtua-balita-history', [OrangtuaController::class, 'hpos'])->middleware('auth', 'orangtua');
//orangtua print pdf
Route::get('/pdf', [OrangtuaController::class, 'exportPDF']);
