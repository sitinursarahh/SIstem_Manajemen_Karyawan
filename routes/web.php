<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    Route::get('/data-pengguna',[DashboardController::class,'showDataPengguna'])->name('dashboard.showDataPengguna');

});

Route::get('/data-pengguna', [DashboardController::class, 'showDataPengguna'])->name('dashboard.showDataPengguna')
 ->middleware('admin');

Route::get('/absen', [AttendanceController::class, 'showForm'])->name('dashboard.absenKaryawan');
Route::post('/absen', [AttendanceController::class, 'store'])->name('absen.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/absen', [AbsenController::class, 'showForm'])->name('dashboard.absenKaryawan');
    Route::post('/absen', [AbsenController::class, 'store'])->name('absen.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfileController::class, 'show'])->name('profil.show');
});
