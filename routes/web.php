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


Route::get('/perkuliahan',[AdminController::class, 'perkuliahan']);
Route::get('/admin/mahasiswa',[AdminController::class, 'mhsPage']);
Route::get('/admin/dosen',[AdminController::class, 'dosenPage']);


// Nanti hapus "mahasiswa" and id
Route::get('/mahasiswa/profile/{id}',[MahasiswaController::class, 'detail']);
Route::get('/mahasiswa/mata-kuliah/',[MahasiswaController::class, 'matkul']);
Route::get('/mahasiswa/{id}/perkuliahan',[MahasiswaController::class, 'perkuliahan']);
Route::get('/mahasiswa/{id}/perkuliahan/{kode_mk}',[MahasiswaController::class, 'kelas']);


Route::get('/dosen/profile/{id}',[DosenController::class, 'detail']);
