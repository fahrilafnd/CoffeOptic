<?php

use App\Http\Controllers\HasillaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KontrolController;


Route::get('/', function () {
    return view('login');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/homepage', [HomepageController::class, 'index'])->name('home');
Route::get('/panduan', function () {
    return view('panduan');
})->name('panduan');
Route::get('/hasil-laporan', [HasillaporanController::class, 'index']);

Route::post('/alat/kontrol', [KontrolController::class, 'kontrolAlat']);
Route::post('/logout', function () {
    return redirect('/'); // atau ke halaman login
})->name('logout');





