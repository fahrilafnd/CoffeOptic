<?php

use App\Http\Controllers\HasillaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KontrolController;

Route::redirect('/', '/login');

// ✅ Login GET dengan guest middleware
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

// ✅ Login POST TANPA middleware (penting!)
Route::post('/login', [LoginController::class, 'login']);

// Route terproteksi
Route::middleware(['auth'])->group(function () {
    Route::get('/homepage', [HomepageController::class, 'index'])->name('home');
    Route::get('/panduan', function () {
        return view('panduan');
    })->name('panduan');
    Route::get('/hasil-laporan', [HasillaporanController::class, 'index']);
    Route::post('/alat/kontrol', [KontrolController::class, 'kontrolAlat']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});