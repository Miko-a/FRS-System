<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;

// Root URL ke halaman login
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;

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


    //Khusus admin

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/mataKuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
        Route::get('/admin/mataKuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');
        Route::get('/admin/mataKuliah/edit/{id}', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');
        Route::get('/admin/mataKuliah/detail/{id}', [MatakuliahController::class, 'show'])->name('matakuliah.show');

        Route::get('/admin/kelas', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/admin/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::get('/admin/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::get('/admin/kelas/detail/{id}', [KelasController::class, 'show'])->name('kelas.show');

        Route::get('/admin/listUser', [UserController::class, 'index'])->name('user.index');

        Route::get('/admin/listUser/createAkun', [UserController::class, 'createAkun'])->name('user.createAkun');
        Route::post('/admin/listUser/storeAkun', [UserController::class, 'storeAkun'])->name('user.storeAkun');

        Route::get('/admin/listUser/createBiodata/{role}', [UserController::class, 'createBiodata'])->name('user.createBiodata');
        Route::post('/admin/listUser/storeBiodata/{role}', [UserController::class, 'storeBiodata'])->name('user.storeBiodata');

        Route::get('/admin/listUser/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

        Route::get('/admin/listUser/data/{id}', [UserController::class, 'show'])->name('user.show');
    });

    // Khusus dosen
    Route::middleware('role:dosen')->group(function () {
        Route::get('/dosen/profile', [DosenController::class, 'show'])->name('dosen.profile');
        Route::get('dosen/ajuanUbahJadwal', [DosenController::class, 'showAjuanUbahJadwal'])->name('dosen.ajuanUbahJadwal');
        Route::get('dosen/informasiKelas', [DosenController::class, 'showInformasiKelas'])->name('dosen.informasiKelas');
        Route::get('/dosen/kurikulum', [DosenController::class, 'showKurikulum'])->name('dosen.kurikulum');
    });


    // Khusus mahasiswa
    Route::middleware('role:mahasiswa')->group(function () {
        Route::get('/mahasiswa/profile', [MahasiswaController::class, 'show'])->name('mahasiswa.profile');
        // Route::get('dosen/ajuanUbahJadwal', [DosenController::class, 'showAjuanUbahJadwal'])->name('dosen.ajuanUbahJadwal');
        Route::get('mahasiswa/informasiKelas', [MahasiswaController::class, 'showInformasiKelas'])->name('mahasiswa.informasiKelas');
        Route::get('/mahasiswa/kurikulum', [MahasiswaController::class, 'showKurikulum'])->name('mahasiswa.kurikulum');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::resource('matakuliah', MatakuliahController::class);
    Route::resource('user', UserController::class);
    
    Route::get('/matakuliah/get/{kode_mk}', [MatakuliahController::class, 'getMatkul']);

    Route::resource('kelas', KelasController::class)->parameter('kelas', 'kelas');

    Route::get('/kelas/get-by-mk/{kode_mk}', [KelasController::class, 'getByMatkul']);
    
});