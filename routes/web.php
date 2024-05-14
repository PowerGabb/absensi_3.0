<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

// Route Utama
Route::get('/', [ClientController::class, 'index'])->middleware(['auth', 'only-siswa']);
Route::get('/detail/{id}', [ClientController::class, 'detail']);

Route::middleware(['auth'])->group(function () {

    

    // Route Riwayat Absen Siswa
    Route::get('/absenku', [ClientController::class, 'absenku']);

    // Route Kehadiran Masuk keluar
    Route::post('/absensi/masuk', [ClientController::class, 'masuk']);
    Route::post('/absensi/keluar', [ClientController::class, 'keluar']);

    // Route Pengajuan Sakit
    Route::get('/pengajuan-sakit', [ClientController::class, 'pengajuanSakit']);
    Route::post('/pengajuan-sakit', [ClientController::class, 'simpanSakit']);

    // Route Pengajuan Izin
    Route::get('/pengajuan-izin', [ClientController::class, 'pengajuanIzin']);
    Route::post('/pengajuan-izin', [ClientController::class, 'simpanIzin']);
    
});

Route::middleware(['auth', 'only-admin'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route Management P
    Route::resource('/siswa', UserController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/jurusan', JurusanController::class);

    // Route Riwayat Sakit
    Route::get('/sakit', [AbsenController::class, 'sakit']);

    // Route Riwayat Izin 
    Route::get('/izin', [AbsenController::class, 'izin']);

    // Route Rekap Data
    Route::get('/rekap', [AbsenController::class, 'rekap']);

    // Mengatur Jam Keluar
    Route::get('/jam', [AbsenController::class, 'jam']);
    Route::get('/jam/edit', [AbsenController::class, 'jamEdit']);
    Route::post('/jam/update', [AbsenController::class, 'jamUpdate']);
});
