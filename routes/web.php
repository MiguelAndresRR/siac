<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::redirect ('/', 'login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/user/dashboard', function() {
        return view('user.dashboard');
    })->name('user.dashboard');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

