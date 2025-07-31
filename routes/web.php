<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ComprasController;

Route::middleware('prevent-back')->group(function () {
    Route::redirect('/', 'login');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth')->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');
            Route::get('productos', [ProductoController::class, 'index']);
            Route::get('usuarios', [UsuarioController::class, 'index']);
            Route::get('proveedor', [ProveedorController::class, 'index']);
        });
        // Mostrar la lista de productos
        Route::get('admin/productos/index', [ProductoController::class, 'index'])->name('admin.productos.index');
        // Formulario para crear un nuevo producto
        Route::get('admin/productos/create', [ProductoController::class, 'create'])->name('admin.productos.create');
        // Guardar nuevo producto (form create)
        Route::post('admin/productos/index', [ProductoController::class, 'store'])->name('admin.productos.store');
        // Mostrar el formulario de edición
        Route::get('admin/productos/index/{producto}', [ProductoController::class, 'edit'])->name('admin.productos.edit');
        // Actualizar producto (form edit)  
        Route::get('admin/productos/{producto}', [ProductoController::class, 'show'])->name('admin.productos.show');
        //Actualiza producto
        Route::put('admin/productos/{producto}', [ProductoController::class, 'update'])->name('admin.productos.update');
        // Eliminar producto
        Route::delete('admin/productos/{producto}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');
        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        //usuarios
        Route::get('admin/usuarios/index', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
        // Crear usuario
        Route::get('admin/usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuarios.create');
        // Guardar nuevo producto (form create)
        Route::post('admin/usuarios/index', [UsuarioController::class, 'store'])->name('admin.usuarios.store');
        // Mostrar el formulario de edición
        Route::get('admin/usuarios/index/{usuario}', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit');
        // Actualizar usuario (form edit)
        Route::get('admin/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('admin.usuarios.show');
        //Actualizar usuario
        Route::put('admin/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('admin.usuarios.update');
        // Eliminar usuario
        Route::delete('admin/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');
        
        //proveedor
        Route::get('admin/proveedor/index', [ProveedorController::class, 'index'])->name('admin.proveedor.index');
        // Crear proveedor
        Route::get('admin/proveedor/create', [ProveedorController::class, 'create'])->name('admin.proveedor.create');
        // Guardar nuevo proveedor (form create)
        Route::post('admin/proveedor/index', [ProveedorController::class, 'store'])->name('admin.proveedor.store');
        // Mostrar proveedor
        Route::get('admin/proveedor/{proveedor}', [ProveedorController::class, 'show'])->name('admin.proveedor.show');
        // Mostrar el formulario de edición
        Route::get('admin/proveedor/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('admin.proveedor.edit');
        // Actualizar proveedor (form edit)
        Route::put('admin/proveedor/{proveedor}', [ProveedorController::class, 'update'])->name('admin.proveedor.update');
        // Eliminar proveedor
        Route::delete('admin/proveedor/{proveedor}', [ProveedorController::class, 'destroy'])->name('admin.proveedor.destroy');

        //compras
        Route::get('admin/compras/index', [ComprasController::class, 'index'])->name('admin.compras.index');
        // Crear compra
        Route::get('admin/compras/create', [ComprasController::class, 'create'])->name('admin.compras.create');
        // Guardar nueva compra (form create)
        Route::post('admin/compras/index', [ComprasController::class, 'store'])->name('admin.compras.store');
        // Mostrar compra
        Route::get('admin/compras/{compra}', [ComprasController::class, 'show'])->name('admin.compras.show');
        // Mostrar el formulario de edición
        Route::get('admin/compras/{compra}/edit', [ComprasController::class, 'edit'])->name('admin.compras.edit');
        // Actualizar compra (form edit)
        Route::put('admin/compras/{compra}', [ComprasController::class, 'update'])->name('admin.compras.update');
        // Eliminar compra
        Route::delete('admin/compras/{compra}', [ComprasController::class, 'destroy'])->name('admin.compras.destroy');
    });
});
