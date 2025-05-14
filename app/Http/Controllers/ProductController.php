<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Unit;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::with(['unidad', 'categoria'])->get();
        return view('admin.productos.index', compact('productos'));
    }
    public function create()
    {
        $categorias = Category::all();
        $unidades = Unit::all();
        return view('admin.productos.create', compact('categorias', 'unidades'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio_producto' => 'required|numeric|min:0',
            'id_categoria_producto' => 'required|exists:categoria_producto,id_categoria_producto',
            'id_unidad_peso_producto' => 'required|exists:unidad_peso_producto,id_unidad_peso_producto',
        ]);

        $existingProduct = Product::where('nombre_producto', $request->nombre_producto)
            ->where('id_categoria_producto', $request->id_categoria_producto)
            ->where('id_unidad_peso_producto', $request->id_unidad_peso_producto)
            ->first();

        if ($existingProduct) {
            return redirect()->back()->with('message', [
                'type' => 'error',
                'text' => 'El producto ya existe en la base de datos.'
            ]);
        } else {
            $product = Product::create($request->all());
            return redirect()->back()->with('message', [
                'type' => 'success',
                'text' => 'El producto se ha creado correctamente.'
            ]);
        }
    }

    public function show(Product $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_producto)
    {
        $producto = Product::find($id_producto);
        if (!$producto) {
            return redirect()->back()->with('message', [
                'type' => 'error',
                'text' => 'El producto no existe en la base de datos.'
            ]);
        }

        $producto->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => 'El producto se ha eliminado correctamente.'
        ]);
    }
}
