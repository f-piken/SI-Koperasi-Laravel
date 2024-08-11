<?php

use App\Http\Controllers\anggotaController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pinjamController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\simpanController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear-cache', function() {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::middleware(['auth','posisi:admin'])->group(function () {
    Route::resource('karyawan', karyawanController::class);
    Route::get('/karyawan/hapus/{id}', [karyawanController::class, 'delete']);
});

Route::middleware(['auth','posisi:admin,pegawai'])->group(function () {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::resource('anggota', anggotaController::class);
    Route::get('/anggota/hapus/{id}', [anggotaController::class, 'delete']);
    Route::resource('pinjaman', pinjamController::class);
    Route::resource('simpanan', simpanController::class);
    Route::resource('transaksi', transaksiController::class);
    Route::get('/anggota-report', [ReportController::class,'anggota']);
    Route::get('/karyawan-report', [ReportController::class,'karyawan']);
    Route::get('/pinjaman-report', [ReportController::class,'pinjaman']);
    Route::get('/simpanan-report', [ReportController::class,'simpanan']);
    Route::get('/transaksi-report', [ReportController::class,'transaksi']);
    Route::get('/login/show', [loginController::class, 'show']);
    Route::get('/login/ganti', [loginController::class,'ganti'])->name('login.ganti');
    Route::post('/login/simpan', [loginController::class,'simpan'])->name('login.simpan');
    Route::post('logout', [loginController::class, 'destroy'])->name('logout');
});
Route::post('login', [loginController::class,'store'])->name('login.store');
Route::get('login', [loginController::class, 'index'])->name('login');
