<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;

// Root URL ke halaman login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');

Route::middleware('web')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Route yang membutuhkan autentikasi
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

    // Khusus dosen
    Route::middleware('role:dosen')->group(function () {
        Route::get('/dosen/profile', [DosenController::class, 'show'])->name('dosen.profile');
        Route::get('dosen/ajuanUbahJadwal'  , [DosenController::class, 'showAjuanUbahJadwal'])->name('dosen.ajuanUbahJadwal');
        Route::get('dosen/informasiKelas', [DosenController::class, 'showInformasiKelas'])->name('dosen.informasiKelas');
        Route::get('/dosen/kurikulum', [DosenController::class, 'showKurikulum'])->name('dosen.kurikulum');
    });


    // Khusus mahasiswa
    Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/profile', [MahasiswaController::class, 'show'])->name('mahasiswa.profile');
        Route::post('mahasiswa/ambil', [MahasiswaController::class, 'ambilMatkul'])->name('mahasiswa.ambil');
        Route::post('mahasiswa/dropMatkul', [MahasiswaController::class, 'dropMatkul'])->name('mahasiswa.dropMatkul');
        Route::get('mahasiswa/informasiKelas', [MahasiswaController::class, 'showInformasiKelas'])->name('mahasiswa.informasiKelas');
        Route::get('/mahasiswa/kurikulum', [MahasiswaController::class, 'showKurikulum'])->name('mahasiswa.kurikulum');
    });
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::resource('matakuliah', MatakuliahController::class);
    
    Route::get('/matakuliah/get/{kode_mk}', [MatakuliahController::class, 'getMatkul']);

    Route::resource('kelas', KelasController::class)->parameter('kelas', 'kelas');

    Route::get('/kelas/get-by-mk/{kode_mk}', [KelasController::class, 'getByMatkul']);

    Route::resource('user', UserController::class)->middleware('role:admin');
    
});