<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;




Route::get('/', function () {
    return view('welcome');
});

Route::resource('jurusan', JurusanController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('kelas', KelasController::class);



