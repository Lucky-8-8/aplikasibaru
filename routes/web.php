<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\MultiAuth;

// Login & Logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Logout bisa GET dan POST
Route::match(['get','post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// --------------------
// Routes siswa
// --------------------
Route::middleware([MultiAuth::class])->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    Route::post('/aspirasi', [SiswaController::class, 'store'])->name('siswa.store');
});

// --------------------
// Routes admin
// --------------------
Route::middleware([MultiAuth::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/aspirasi/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});



