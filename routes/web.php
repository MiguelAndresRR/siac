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
        // Mostrar la lista de productos
        Route::get('admin/productos/index', [ProductController::class, 'index'])->name('admin.productos.index');
        // Formulario para crear un nuevo producto
        Route::get('admin/productos/create', [ProductController::class, 'create'])->name('admin.productos.create');
        // Guardar nuevo producto (form create)
        Route::post('admin/productos/index', [ProductController::class, 'store'])->name('admin.productos.store');
        // Mostrar el formulario de edición
        Route::get('admin/productos/index/{producto}', [ProductController::class, 'edit'])->name('admin.productos.edit');
        // Actualizar producto (form edit)  
        Route::get('admin/productos/{producto}', [ProductController::class, 'show'])->name('admin.productos.show');
        //Actualiza el
        Route::put('admin/productos/{producto}', [ProductController::class, 'update'])->name('admin.productos.update');
        // Eliminar producto
        Route::delete('admin/productos/{producto}', [ProductController::class, 'destroy'])->name('admin.productos.destroy');
        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
