<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\JenisSimpananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PengambilanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/hehe', function (Request $request) {
  return $request->user();
});

Route::get('/', [PagesController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/anggota', AnggotaController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/jenissimpanan', JenisSimpananController::class)->middleware('auth');
Route::get('/pinjaman/{id}/bayar', [PinjamanController::class, 'bayarIndex'])->name('pembayaran.index')->middleware('auth');
Route::put('/pinjaman/{idPinjaman}/bayar/{idDetail}', [PinjamanController::class, 'bayar'])->name('pembayaran.bayar')->middleware('auth');
Route::resource('/pinjaman', PinjamanController::class)->middleware('auth');

Route::get('/simpanan', [SimpananController::class, 'index'])->name('simpanan.index')->middleware('auth');
Route::get('/simpanan/search/{userId}', [SimpananController::class, 'search'])->name('simpanan.search')->middleware('auth');
Route::post('/simpanan', [SimpananController::class, 'store'])->name('simpanan.store')->middleware('auth');
Route::delete('/simpanan/{id}', [SimpananController::class, 'destroy'])->name('simpanan.destroy')->middleware('auth');

Route::get('/pengambilan', [PengambilanController::class, 'index'])->name('pengambilan.index')->middleware('auth');
Route::get('/pengambilan/search/{userId}', [PengambilanController::class, 'search'])->name('pengambilan.search')->middleware('auth');
Route::post('/pengambilan', [PengambilanController::class, 'store'])->name('pengambilan.store')->middleware('auth');