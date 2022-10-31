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

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/hehe', function (Request $request) {
//   return $request->user();
// });

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::resource('/anggota', AnggotaController::class);
Route::resource('/user', UserController::class);
Route::resource('/jenissimpanan', JenisSimpananController::class);
Route::get('/pinjaman/{id}/bayar', [PinjamanController::class, 'bayarIndex'])->name('pembayaran.index');
Route::put('/pinjaman/{idPinjaman}/bayar/{idDetail}', [PinjamanController::class, 'bayar'])->name('pembayaran.bayar');
Route::resource('/pinjaman', PinjamanController::class);

Route::get('/simpanan', [SimpananController::class, 'index'])->name('simpanan.index');
Route::get('/simpanan/search/{userId}', [SimpananController::class, 'search'])->name('simpanan.search');
Route::post('/simpanan', [SimpananController::class, 'store'])->name('simpanan.store');
Route::delete('/simpanan/{id}', [SimpananController::class, 'destroy'])->name('simpanan.destroy');

Route::get('/pengambilan', [PengambilanController::class, 'index'])->name('pengambilan.index');
Route::get('/pengambilan/search/{userId}', [PengambilanController::class, 'search'])->name('pengambilan.search');
Route::post('/pengambilan', [PengambilanController::class, 'store'])->name('pengambilan.store');