<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\TempatTidurController;
use App\Http\Controllers\JadwalDokterController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home/janji-temu', [JanjiTemuController::class, 'index'])->name('janji.temu');

Route::resource('dashboard', AdminController::class);
Route::resource('pasien', PasienController::class);
Route::resource('dokter', DokterController::class);
Route::get('/pasien/{pasien}', [PasienController::class, 'show'])->name('pasien.show');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
    Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
Route::patch('/tempat-tidur/{id}/status', [TempatTidurController::class, 'updateStatus'])->name('tt.updateStatus');
Route::get('/rawat-inap/{pasien}/form', [RawatInapController::class, 'create'])->name('rawatInap.form');
Route::post('/rawat-inap', [RawatInapController::class, 'store'])->name('rawatInap.store');
Route::get('/rawat-inap', [RawatInapController::class, 'index'])->name('rawatInap.index');
Route::delete('/rawat-inap/{id}', [RawatInapController::class, 'destroy'])->name('rawatInap.destroy');
Route::get('/rawat-inap/{id}', [RawatInapController::class, 'show'])->name('rawatInap.show');

Route::get('/jadwal', [JadwalDokterController::class, 'index'])->name('dokter.jadwal');
Route::get('/jadwal/create', [JadwalDokterController::class, 'create'])->name('dokter.jadwal.create');
Route::post('/jadwal', [JadwalDokterController::class, 'store'])->name('dokter.jadwal.store');
Route::get('/jadwal/{jadwal}/edit', [JadwalDokterController::class, 'edit'])->name('dokter.jadwal.edit');
Route::put('/jadwal/{jadwal}', [JadwalDokterController::class, 'update'])->name('dokter.jadwal.update');
Route::delete('/jadwal/{jadwal}', [JadwalDokterController::class, 'destroy'])->name('dokter.jadwal.destroy');

