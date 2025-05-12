<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::middleware('prevent-back')->group(function () {
    Route::redirect('/', 'login');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/user/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');
        Route::get('admin/productos/index', [ProductController::class, 'index'])->name('admin.productos.index');
        Route::resource('admin/productos/index', ProductController::class)->except(['index']);
        Route::get('admin/productos/create', [ProductController::class, 'create'])->name('admin.productos.create');
        Route::post('admin/productos/index', [ProductController::class, 'store'])->name('admin.productos.index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
