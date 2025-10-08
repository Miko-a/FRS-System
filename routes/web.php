<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatkulController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');

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


    Route::get('/matakuliah/ambil', [MatakuliahController::class, 'ambil'])
        ->name('matakuliah.ambil')
        ->middleware('role:mahasiswa');

    Route::get('/dosen/profile', [DosenController::class, 'show'])->name('dosen.profile');
    Route::get('/dosen/ajuanUbahJadwal', [DosenController::class, 'showAjuanUbahJadwal'])
        ->name('dosen.ajuanUbahJadwal')->middleware('auth', 'role:dosen');

    Route::resource('matakuliah', MatakuliahController::class)->middleware('auth', 'role:admin');;
    Route::get('/matakuliah/get/{kode_mk}', [MatakuliahController::class, 'getMatkul']);

    Route::resource('kelas', KelasController::class)->parameter('kelas', 'kelas')->middleware('auth', 'role:admin');;
    Route::get('/kelas/get-by-mk/{kode_mk}', [KelasController::class, 'getByMatkul'])->middleware('auth', 'role:admin');;

    Route::resource('matkul', MatkulController::class)->middleware('auth', 'role:dosen');;
    Route::get('/matkul/{matkul}', [MatkulController::class, 'show'])
    ->name('matkul.show')
    ->middleware('auth', 'role:dosen');

    Route::resource('user', UserController::class)->middleware('auth', 'role:admin');;
});
