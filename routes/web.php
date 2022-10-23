<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\JenisSimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;

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

Route::get('/', function() {
    return view('home');
});

Route::get('/test', function() {
    return view('test');
});

Route::resource('/anggota', AnggotaController::class);
Route::resource('/user', UserController::class);
Route::resource('/jenissimpanan', JenisSimpananController::class);
Route::resource('/pinjaman', PinjamanController::class);

Route::get('/simpanan', [SimpananController::class, 'index'])->name('simpanan.index');
Route::get('/simpanan/search/{userId}', [SimpananController::class, 'search'])->name('simpanan.search');
Route::post('/simpanan', [SimpananController::class, 'store'])->name('simpanan.store');
Route::delete('/simpanan/{id}', [SimpananController::class, 'destroy'])->name('simpanan.destroy');