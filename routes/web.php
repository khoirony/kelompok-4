<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MasyarakatController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Authentication

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index'])
    ->name("admin.dashboard")
    ->middleware('auth');
// Route::get('/pegawai', [PegawaiController::class, 'index'])->middleware('auth');
Route::get('/masyarakat', [MasyarakatController::class, 'index'])
    ->name("masyarakat.index")
    ->middleware('auth');

Route::get('/tambahpegawai', [AdminController::class, 'tambahpegawai'])
    ->name("admin.tambahPegawai")
    ->middleware('auth');
Route::post('/tambahpegawai', [AdminController::class, 'storepegawai'])->middleware('auth');
Route::get('/editpegawai/{id}', [AdminController::class, 'editpegawai'])->middleware('auth');
Route::post('/editpegawai', [AdminController::class, 'updatepegawai'])->middleware('auth');
Route::get('/hapuspegawai/{id}', [AdminController::class, 'hapuspegawai'])->middleware('auth');

Route::get('/tambahmahasiswa', [PegawaiController::class, 'tambahmahasiswa'])->middleware('auth');
Route::post('/tambahmahasiswa', [PegawaiController::class, 'storemahasiswa'])->middleware('auth');
Route::get('/editmahasiswa/{id}', [PegawaiController::class, 'editmahasiswa'])->middleware('auth');
Route::post('/editmahasiswa', [PegawaiController::class, 'updatemahasiswa'])->middleware('auth');
Route::get('/hapusmahasiswa/{id}', [PegawaiController::class, 'hapusmahasiswa'])->middleware('auth');

// Route::get('/aduanmasuk', [PegawaiController::class, 'aduanmasuk'])->middleware('auth');
Route::get('/aduandiproses', [PegawaiController::class, 'aduandiproses'])->middleware('auth');
Route::get('/aduanditolak', [PegawaiController::class, 'aduanditolak'])->middleware('auth');
Route::get('/aduanselesai', [PegawaiController::class, 'aduanselesai'])->middleware('auth');

Route::get('/kelolatanggapan/{id}', [PegawaiController::class, 'kelolatanggapan'])->middleware('auth');
Route::post('/kelolatanggapan', [PegawaiController::class, 'storetanggapan'])->middleware('auth');
Route::get('/hapustanggapan/{id}', [PegawaiController::class, 'hapustanggapan'])->middleware('auth');

Route::get('/tambahaduan', [MasyarakatController::class, 'tambahaduan'])
    ->name("masyarakat.create")
    ->middleware('auth');
Route::post('/tambahaduan', [MasyarakatController::class, 'storeaduan'])->middleware('auth');
// Route::get('/historyaduan', [MasyarakatController::class, 'historyaduan'])->middleware('auth');
Route::get('/editaduan/{id}', [MasyarakatController::class, 'editaduan'])->middleware('auth');
Route::post('/editaduan', [MasyarakatController::class, 'storeedit'])->middleware('auth');
Route::get('/hapusaduan/{id}', [MasyarakatController::class, 'hapusaduan'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'edit'])->middleware('auth');
Route::post('/changepass', [ProfileController::class, 'changepass'])->middleware('auth');
