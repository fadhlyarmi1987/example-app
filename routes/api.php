<?php

use App\Http\Controllers\Api\AbsensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ListAbsenController;
use App\Http\Controllers\Api\TugasController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Api\NotifController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API USERS

Route::get('/users', [UserController::class, 'index'])->name('api.users.index');

Route::get('users/{id}', [UserController::class, 'show']);

Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);

Route::put('/users/{id}', [UserController::class, 'update'])->name('api.users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');

// API LISTABSEN

Route::get('listabsen', [AbsensiController::class, 'listabsen']);
Route::get('listabsen2/{id}', [AbsensiController::class, 'listAbsenByIdUser']);
Route::post('absen', [AbsensiController::class, 'store']);

// API TUGAS

Route::get('/files', [TugasController::class, 'apiIndex']);

Route::post('/files', [TugasController::class, 'apiStore']);

Route::get('/files/{id}', [TugasController::class, 'apiDownload']);

Route::delete('/files/{id}', [TugasController::class, 'apiDestroy']);


// API NOTIF

Route::get('/notifications', [NotifController::class, 'apiIndex']);

Route::post('/notifications', [NotifController::class, 'apiStore']);

Route::put('/notifications/{id}', [NotifController::class, 'apiUpdate']);

Route::delete('/notifications/{id}', [NotifController::class, 'apiDestroy']);
