<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('matakuliah', MatakuliahController::class);

