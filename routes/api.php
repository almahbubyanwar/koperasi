<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisSimpananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/anggota/getData/{id}', [AnggotaController::class, 'getData']);
Route::get('/user/getData/{id}', [UserController::class, 'getData']);
Route::get('/jenissimpanan/getData/{id}', [JenisSimpananController::class, 'getData']);