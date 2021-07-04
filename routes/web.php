<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('v_home');
// });

// Route::get('/', );

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/pegawai',[PegawaiController::class, 'index']);
Route::get('/article',[WebController::class, 'index']);
Route::get('/anggota',[WebController::class, 'anggotaPage']);



Route::group(['middleware'=>'admin'], function () {
    Route::get('/perkuliahan',[AdminController::class, 'perkuliahan']);

    Route::get('/admin/mhs',[AdminController::class, 'mhsPage'])->name('mhsList');
    Route::get('/admin/mhs/detail/{id}', [AdminController::class, 'detailMahasiswa'])->name('mhsDetail');
    Route::get('/admin/mhs/add', [AdminController::class, 'addMahasiswa']);
    Route::post('/admin/mhs/insert', [AdminController::class, 'insertMahasiswa']);
    Route::get('/admin/mhs/delete/{id}', [AdminController::class, 'deleteMahasiswa']);
    Route::get('/admin/mhs/edit/{id}', [AdminController::class, 'editMahasiswa']);
    Route::post('/admin/mhs/update/{id}', [AdminController::class, 'updateMahasiswa']);


    Route::get('/admin/dosen',[AdminController::class, 'dosenPage'])->name('dosenList');
    Route::get('/admin/dosen/detail/{id}', [AdminController::class, 'detailDosen'])->name('dosenDetail');
    Route::get('/admin/dosen/add', [AdminController::class, 'addDosen']);
    Route::post('/admin/dosen/insert', [AdminController::class, 'insertDosen']);
    Route::get('/admin/dosen/delete/{id}', [AdminController::class, 'deleteDosen']);
    Route::get('/admin/dosen/edit/{id}', [AdminController::class, 'editDosen']);
    Route::post('/admin/dosen/update/{id}', [AdminController::class, 'updateDosen']);
});

Route::group(['middleware'=>'dosen'], function () {
    Route::get('/dosen/profile/{id}',[DosenController::class, 'detail']);
    Route::get('/dosen/profile/{id}',[DosenController::class, 'detail'])->name('profilDosen');
    Route::get('/dosen/matakuliah',[DosenController::class, 'matakuliah'])->name('matakuliah');

    Route::post('/dosen/matakuliah/insert', [DosenController::class, 'insertMatkul'])->name('inMatkul');
    Route::get('/admin/mhs/delete/{id}', [AdminController::class, 'deleteMahasiswa']);
    Route::get('/admin/mhs/edit/{id}', [AdminController::class, 'editMahasiswa']);
    Route::post('/admin/mhs/update/{id}', [AdminController::class, 'updateMahasiswa']);


    Route::get('/admin/dosen',[AdminController::class, 'dosenPage'])->name('dosenList');
    Route::get('/admin/dosen/detail/{id}', [AdminController::class, 'detailDosen'])->name('dosenDetail');
    Route::get('/admin/dosen/add', [AdminController::class, 'addDosen']);
    Route::post('/admin/dosen/insert', [AdminController::class, 'insertDosen']);
    Route::get('/admin/dosen/delete/{id}', [AdminController::class, 'deleteDosen']);
    Route::get('/admin/dosen/edit/{id}', [AdminController::class, 'editDosen']);
    Route::post('/admin/dosen/update/{id}', [AdminController::class, 'updateDosen']);
});




// Nanti hapus "mahasiswa" and id
Route::get('/mahasiswa/profile/{id}',[MahasiswaController::class, 'detail']);
Route::get('/mahasiswa/mata-kuliah/',[MahasiswaController::class, 'matkul']);
Route::get('/mahasiswa/{id}/perkuliahan',[MahasiswaController::class, 'perkuliahan']);
Route::get('/mahasiswa/{id}/perkuliahan/{kode_mk}',[MahasiswaController::class, 'kelas']);


