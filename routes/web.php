<?php

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

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('master/klasifikasi', [App\Http\Controllers\KlasifikasiController::class, 'index']);
    Route::get('master/satuan', [App\Http\Controllers\SatuanController::class, 'index']);
    Route::get('master/rekanan', [App\Http\Controllers\RekananController::class, 'index']);
    Route::get('master/bagian', [App\Http\Controllers\BagianController::class, 'index']);
    Route::get('master/barang', [App\Http\Controllers\BarangController::class, 'index']);
    
    Route::get('user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('persediaanbarang/b22', [App\Http\Controllers\PersediaanBarang::class, 'indexB22']);
    Route::get('persediaanbarang/b23', [App\Http\Controllers\PersediaanBarang::class, 'indexB23']);
    
    Route::get('penerimaan', [App\Http\Controllers\PenerimaanController::class, 'index']);
    Route::get('penerimaan/create', [App\Http\Controllers\PenerimaanController::class, 'create'])->name('penerimaan.create');
    
    Route::get('pengeluaran', [App\Http\Controllers\PengeluaranController::class, 'index']);
    Route::get('pengeluaran/create', [App\Http\Controllers\PengeluaranController::class, 'create'])->name('pengeluaran.create');
    
    Route::get('rekapitulasi', [App\Http\Controllers\RekapitulasiController::class, 'index']);
});