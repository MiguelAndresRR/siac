<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/user/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');
        Route::get('/admin/productos', [IndexController::class, 'producto'])->name('admin.productos');
        Route::resource('productos', ProductController::class);
        Route::get('/admin/productos/crear', [ProductController::class, 'create'])->name('admin.productos.create');
        Route::post('/admin/productos', [ProductController::class, 'store'])->name('admin.productos');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
