<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MagangController;

Route::get('/', function () {
    return view('welcome');
});

// Route method GET

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Route::get('/magang', [AuthController::class, 'magang'])->name('magang');

Route::get('/absen', [AuthController::class, 'absen'])->name('absen');
Route::get('/notif', [AnnouncementController::class, 'index'])->name('notifications.index');
Route::get('/tugas', [AuthController::class, 'tugas'])->name('tugas');
Route::get('/getAttendance', [AuthController::class, 'getAttendance'])->name('getAttendance');
Route::get('/beranda', [BerandaController::class, 'beranda']);
Route::get('/penjumlahan', [BerandaController::class, 'penjumlahan']);
Route::get('/tugas', [FileController::class, 'index']);
Route::get('/unduh/{id}', [FileController::class, 'download']);
Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth')->name('beranda');
Route::get('/notif', [AnnouncementController::class, 'index'])->name('notifications.index');

//method POST
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); // Menambahkan route post untuk register
Route::post('/upload', [FileController::class, 'store']);
Route::post('/updateKaryawan', [KaryawanController::class, 'update']);
Route::post('/deleteKaryawan', [KaryawanController::class, 'destroy']);

Route::post('/deleteMagang', [MagangController::class, 'destroy']);

Route::post('/updateMagang', [MagangController::class, 'update']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/notif', [AnnouncementController::class, 'store'])->name('notifications.store');

//method PUT
Route::put('/notif/{id}', [AnnouncementController::class, 'update'])->name('notifications.update');

// Route method DELETE
Route::delete('/notif', [AnnouncementController::class, 'destroy'])->name('notifications.destroy');
Route::delete('/hapus/{id}', [FileController::class, 'destroy']);
Route::delete('/notifications/{id}', [AnnouncementController::class, 'destroy'])->name('notifications.destroy');

// Rute yang dilindungi oleh middleware auth

Route::middleware(['user_type'])->group(function () {

    Route::get('/karyawan', [KaryawanController::class, 'karyawan'])->name('karyawan');

    Route::get('/magang', [MagangController::class, 'magang'])->name('magang');
    // Tambahkan semua rute lain yang ingin dilindungi disini
});

