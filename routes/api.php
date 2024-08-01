<?php

use App\Http\Controllers\Api\AbsensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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

Route::get('/users', [UserController::class, 'index'])->name('api.users.index');

Route::get('users/{id}', [UserController::class, 'show']);

Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);

Route::put('/users/{id}', [UserController::class, 'update'])->name('api.users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');

Route::get('listabsen', [AbsensiController::class, 'listabsen']);

Route::get('/listabsenuser', [AbsensiController::class, 'userid']);