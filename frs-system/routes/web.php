<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AuthController;

// mengarahkan root URL ke halaman login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');

// Route login
Route::middleware('web')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/mahasiswa/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard')->middleware('role:mahasiswa');

    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    })->name('dosen.dashboard')->middleware('role:dosen');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('role:admin');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Untuk matkul -sementara tes CRUD, success-
Route::resource('matakuliah', MatakuliahController::class);

