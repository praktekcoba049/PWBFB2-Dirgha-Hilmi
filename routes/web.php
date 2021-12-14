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

Route::get('/home-master', [DataMasController::class, 'homeMaster'])->middleware('auth');

Route::get('/kecamatan', [DataMasController::class, 'kecamatan'])->middleware('auth');

Route::get('/kelurahan', [DataMasController::class, 'kelurahan'])->middleware('auth');

Route::get('/posyandu', [DataMasController::class, 'posyandu'])->middleware('auth');

Route::get('/role', [DataMasController::class, 'role'])->middleware('auth');

Route::get('/balita', [DataMasController::class, 'balita'])->middleware('auth');

Route::get('/user', [DataMasController::class, 'user'])->middleware('auth');


//Tambah Data
Route::get('/tambah-kec', [DataMasController::class, 'tambahKec'])->middleware('auth');
Route::post('/kec-store', [DataMasController::class, 'dataKec']);

Route::get('/tambah-kel', [DataMasController::class, 'tambahKel'])->middleware('auth');
Route::post('/kel-store', [DataMasController::class, 'dataKel']);

Route::get('/tambah-pos', [DataMasController::class, 'tambahPos'])->middleware('auth');
Route::post('/pos-store', [DataMasController::class, 'dataPos']);

Route::get('/tambah-role', [DataMasController::class, 'tambahRole'])->middleware('auth');
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
Route::get('/kecamatan-restore', [DataMasController::class, 'kecamatanRestore'])->middleware('auth');
Route::post('/restore-kecamatan', [DataMasController::class, 'restoreKecamatan']);
Route::post('/delete-permanent-kecamatan', [DataMasController::class, 'forceDelKecamatan']);

Route::get('/kelurahan-restore', [DataMasController::class, 'kelurahanRestore'])->middleware('auth');
Route::post('/restore-kelurahan', [DataMasController::class, 'restoreKelurahan']);
Route::post('/delete-permanent-kelurahan', [DataMasController::class, 'forceDelKelurahan']);

Route::get('/posyandu-restore', [DataMasController::class, 'posyanduRestore'])->middleware('auth');
Route::post('/restore-posyandu', [DataMasController::class, 'restorePosyandu']);
Route::post('/delete-permanent-posyandu', [DataMasController::class, 'forceDelPosyandu']);

Route::get('/role-restore', [DataMasController::class, 'roleRestore'])->middleware('auth');
Route::post('/restore-role', [DataMasController::class, 'restoreRole']);
Route::post('/delete-permanent-role', [DataMasController::class, 'forceDelRole']);

Route::get('/balita-restore', [DataMasController::class, 'balitaRestore'])->middleware('auth');
Route::post('/restore-balita', [DataMasController::class, 'restoreBalita']);
Route::post('/delete-permanent-balita', [DataMasController::class, 'forceDelBalita']);

Route::get('/user-restore', [DataMasController::class, 'userRestore'])->middleware('auth');
Route::post('/restore-user', [DataMasController::class, 'restoreUser']);
Route::post('/delete-permanent-user', [DataMasController::class, 'forceDelUser']);


// Histori
Route::get('/hposyandu', [HistoriController::class, 'hpos'])->middleware('auth');
Route::post('/cari-per-posyandu', [HistoriController::class, 'hposCari']);

Route::get('/hbalita', [HistoriController::class, 'show'])->middleware('auth');

Route::get('/', function () {
    return view('LandPage/home');
})->name('home');

// Login
/*
Route::get('/login', function () {
    return view('login/login');
});

Route::get('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/login', [LoginController::class, 'cekLogin']);
*/

Route::get('/login-admin', [LoginController::class, 'loginAdmin'])->middleware('guest');
Route::post('/admin-cek', [LoginController::class, 'adminCek']);

Route::get('/login-petugas', [LoginController::class, 'loginPetugas'])->middleware('guest');
Route::post('/petugas-cek', [LoginController::class, 'petugasCek']);

Route::get('/login-ortu', [LoginController::class, 'loginOrtu'])->middleware('guest');
Route::post('/ortu-cek', [LoginController::class, 'ortuCek']);


// registrasi
// Route::get('/registrasi', [LoginController::class, 'registrasi'])->middleware('guest');
// Route::post('/registrasi', [LoginController::class, 'register']);

Route::get('/reg-admin', [LoginController::class, 'regAdmin'])->middleware('guest');
Route::post('/reg-admin', [LoginController::class, 'dataAdmin']);

Route::get('/reg-petugas', [LoginController::class, 'regPetugas'])->middleware('guest');
Route::post('/reg-petugas', [LoginController::class, 'dataPetugas']);

Route::get('/reg-ortu', [LoginController::class, 'regOrtu'])->middleware('guest');
Route::post('/reg-ortu', [LoginController::class, 'dataOrtu']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);

// Petugas
Route::get('/petugas', [PetugasController::class, 'petugas'])->middleware('auth');

Route::get('/petugas-balita', [PetugasController::class, 'balita'])->middleware('auth');

Route::get('/petugas-hposyandu', [PetugasController::class, 'hposyandu'])->middleware('auth');
Route::post('/petugas-hposyandu-cari', [PetugasController::class, 'hposCari']);

//Petugas Tambah Data
Route::get('/petugas-balita-tambah', [PetugasController::class, 'tambahBalita'])->middleware('auth');
Route::post('/petugas-balita-simpan', [PetugasController::class, 'simpanBalita']);

Route::get('/petugas-hposyandu-tambah', [PetugasController::class, 'tambahHpos'])->middleware('auth');
Route::post('/petugas-hposyandu-simpan', [PetugasController::class, 'simpanHpos']);

// Orang Tua
Route::get('/orangtua', [OrangtuaController::class, 'index'])->middleware('auth');
Route::post('/cari-his-balita', [OrangtuaController::class, 'hposCari']);
