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

Route::group(['middleware'=>'admin'], function () {
    Route::get('admin/perkuliahan',[AdminController::class, 'perkuliahan']);

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

    Route::get('/admin/matkul',[AdminController::class, 'matkulPage'])->name('matkulList');
    Route::get('/admin/matkul/detail/{id}', [AdminController::class, 'detailMatkul'])->name('matkulDetail');
    Route::get('/admin/matkul/add', [AdminController::class, 'addMatkul']);
    Route::post('/admin/matkul/insert', [AdminController::class, 'insertMatkul']);
    Route::get('/admin/matkul/delete/{id}', [AdminController::class, 'deleteMatkul']);
    Route::get('/admin/matkul/edit/{id}', [AdminController::class, 'editMatkul']);
    Route::post('/admin/matkul/update/{id}', [AdminController::class, 'updateMatkul']);
   
});

Route::group(['middleware'=>'mahasiswa'], function () {

    Route::get('/mahasiswa/profile/',[MahasiswaController::class, 'detail'])->name('MhsProfile');
    Route::get('/mahasiswa/profile/edit',[MahasiswaController::class, 'editDetail']);
    Route::post('/mahasiswa/profile/update', [MahasiswaController::class, 'updateProfile']);
    Route::get('/mahasiswa/mata-kuliah/',[MahasiswaController::class, 'matkul'])->name('MhsMatkul');
    Route::post('/mahasiswa/mata-kuliah/tambah', [MahasiswaController::class, 'tambahMatkul']);
    Route::get('/mahasiswa/perkuliahan',[MahasiswaController::class, 'perkuliahan']);
    // Route::get('/mahasiswa/{id}/perkuliahan/{kode_mk}',[MahasiswaController::class, 'kelas']);
});

Route::group(['middleware'=>'dosen'], function () {
    Route::get('/dosen/profile',[DosenController::class, 'detail'])->name('DosenProfile');
    Route::get('/dosen/profile/edit',[DosenController::class, 'editDetail']);
    Route::post('/dosen/profile/update', [DosenController::class, 'updateProfile']);
    Route::get('/dosen/mata-kuliah/',[DosenController::class, 'matkul'])->name('DosMatkul');
    Route::post('/dosen/mata-kuliah/tambah', [DosenController::class, 'tambahMatkul']);
});

