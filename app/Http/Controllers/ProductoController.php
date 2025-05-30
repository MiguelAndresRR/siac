<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Unidad;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $unidades = Unidad::all();
        return view('admin.productos.index', compact('productos', 'categorias', 'unidades'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio_producto' => 'required|numeric|min:0',
            'id_categoria_producto' => 'required|exists:categoria_producto,id_categoria_producto',
            'id_unidad_peso_producto' => 'required|exists:unidad_peso_producto,id_unidad_peso_producto',
        ]);

        $existingProduct = Producto::where('nombre_producto', $request->nombre_producto)
            ->where('id_categoria_producto', $request->id_categoria_producto)
            ->where('id_unidad_peso_producto', $request->id_unidad_peso_producto)
            ->first();

        if ($existingProduct) {
            return redirect()->route('admin.productos.index')->with('message', [
                'type' => 'error',
                'text' => 'El producto ya existe en la base de datos.'
            ]);
        } else {
            $producto = Producto::create($request->all());
            return redirect()->route('admin.productos.index')->with('message', [
                'type' => 'success',
                'text' => 'El producto se ha creado correctamente.'
            ]);
        }
    }
    public function show(Producto $producto)
    {
        return response()->json([
            'nombre_producto' => $producto->nombre_producto,               // ajusta según tu campo real
            'precio_producto' => $producto->precio_producto,               // ajusta según tu campo real
            'id_categoria_producto' => $producto->id_categoria_producto ?? 'Sin categoría',
            'id_unidad_peso_producto' => $producto->id_unidad_peso_producto?? 'Sin unidad',
        ]);
        return view('admin.productos.show', compact('producto'));
    }

    public function edit(Producto $producto) {}

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio_producto' => 'required|numeric|min:0',
            'id_categoria_producto' => 'required|exists:categoria_producto,id_categoria_producto',
            'id_unidad_peso_producto' => 'required|exists:unidad_peso_producto,id_unidad_peso_producto',
        ]);

        $existingProduct = Producto::where('id_categoria_producto', $request->id_categoria_producto)
            ->where('id_unidad_peso_producto', $request->id_unidad_peso_producto)
            ->where('id_producto', '!=', $producto)
            ->first();

        if ($existingProduct) {
            return redirect()->route('admin.productos.index')->with('message', [
                'type' => 'error',
                'text' => 'El producto ya existe en la base de datos.'
            ]);
        } else {
            $producto->nombre_producto = $request->nombre_producto;
            $producto->precio_producto = $request->precio_producto;
            $producto->id_categoria_producto = $request->id_categoria_producto;
            $producto->id_unidad_peso_producto = $request->id_unidad_peso_producto;
            $producto->save();
            return redirect()->route('admin.productos.index')->with('message', [
                'type' => 'success',
                'text' => 'El producto se ha actualizado correctamente.'
            ]);
        }
    }

    public function destroy($id_producto)
    {
        $producto = Producto::find($id_producto);
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
