<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route method GET

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/karyawan', [AuthController::class, 'karyawan'])->name('karyawan')->middleware('auth');
Route::get('/magang', [AuthController::class, 'magang'])->name('magang');
Route::get('/absen', [AuthController::class, 'absen'])->name('absen');
Route::get('/tugas', [AuthController::class, 'tugas'])->name('tugas');
Route::get('/getAttendance', [AuthController::class, 'getAttendance'])->name('getAttendance');
Route::get('/beranda', [BerandaController::class, 'beranda']);
Route::get('/penjumlahan', [BerandaController::class, 'penjumlahan']);
Route::get('/unduh/{filename}', [FileController::class, 'unduh']);
Route::get('/file-list', [FileController::class, 'fileList']);
Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth')->name('beranda');

// Route method POST
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
//Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); // Menambahkan route post untuk register
Route::post('/register', [UserController::class, 'register']);
Route::post('/upload', [FileController::class, 'upload']);
Route::post('/updateKaryawan', [KaryawanController::class, 'update']);
Route::post('/deleteKaryawan', [KaryawanController::class, 'destroy']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route method DELETE
Route::delete('/hapus/{filename}', [FileController::class, 'hapus']);
cscas







