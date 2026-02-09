<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:siswa')->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard']);
    Route::post('/aspirasi', [SiswaController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/aspirasi/{id}/status', [AdminController::class, 'updateStatus']);
});
