<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

// Route method GET

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/magang', [AuthController::class, 'magang'])->name('magang');
Route::get('/absen', [AuthController::class, 'absen'])->name('absen');
Route::get('/notif', [AuthController::class, 'notif'])->name('notif');
Route::get('/tugas', [AuthController::class, 'tugas'])->name('tugas');
//Route::get('/getAttendance', [AuthController::class, 'getAttendance'])->name('getAttendance');
// Di dalam routes/web.php atau routes/api.php
Route::get('/getAttendance', [AuthController::class, 'getAttendance'])->name('getAttendance');

Route::get('/beranda', [BerandaController::class, 'beranda']);
Route::get('/penjumlahan', [BerandaController::class, 'penjumlahan']);
Route::get('/tugas', [FileController::class, 'index']);
Route::get('/unduh/{id}', [FileController::class, 'download']);
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); // Menambahkan route post untuk register

Route::post('/upload', [FileController::class, 'store']);

Route::post('/updateKaryawan', [KaryawanController::class, 'update']);

Route::post('/deleteKaryawan', [KaryawanController::class, 'destroy']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route method DELETE
Route::delete('/hapus/{id}', [FileController::class, 'destroy']);

Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth')->name('beranda');


// Rute yang dilindungi oleh middleware auth

Route::middleware(['user_type'])->group(function () {

    Route::get('/karyawan', [KaryawanController::class, 'karyawan'])->name('karyawan');
    // Tambahkan semua rute lain yang ingin dilindungi disini
});


//test

