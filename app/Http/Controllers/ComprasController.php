<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compras\DetalleCompra;
use App\Models\compras\Compras;
use App\Models\proveedor\Proveedor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    public function index(Request $request)
    {
        $query = DetalleCompra::query();

        $porPagina = $request->input('entries', 15);
        $compras = $query->paginate($porPagina)->appends($request->query());

        if ($request->ajax()) {
            return view('admin.compras.layoutcompras.tablacompras', compact('compras'))->render();
        }

        return view('admin.compras.index', compact('compras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'fecha_compra' => 'required|date',
            'cantidad_producto' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal_compra' => 'required|numeric|min:0',
            'total_compra' => 'required|numeric|min:0'
        ]);
        // Obtener el usuario autenticado automáticamente
        // En producción, esto debe venir del sistema de autenticación
        $id_usuario = session('user_id');
        // Validación adicional por si no hay usuario en sesión
        if (!$id_usuario) {
            return redirect()->route('login')->with('message', [
                'type' => 'error',
                'text' => 'Sesión no válida. Por favor, inicia sesión nuevamente.'
            ]);
        }
        $datosCompra = $request->all();
        $datosCompra['id_usuario'] = $id_usuario;
        DetalleCompra::create($datosCompra);
        return redirect()->route('admin.compras.index')->with('message', [
            'type' => 'success',
            'text' => 'La compra se ha creado correctamente.'
        ]);
    }
    public function show(DetalleCompra $detalleCompra)
    {
        return response()->json([
            'id_compra' => $detalleCompra->id_compra,
            'id_proveedor' => $detalleCompra->id_proveedor->nombre_proveedor,
            'id_producto' => $detalleCompra->id_producto->nombre_producto,
            'fecha_compra' => $detalleCompra->fecha_compra,
            'cantidad_producto' => $detalleCompra->cantidad_producto,
            'precio_unitario' => $detalleCompra->precio_unitario,
            'subtotal_compra' => $detalleCompra->subtotal_compra,
            'total_compra' => $detalleCompra->total_compra
        ]);
    }

    public function edit(DetalleCompra $detalleCompra)
    {
        $detalleCompra = DetalleCompra::all();

        return view('admin.compras.index', compact('detalleCompra'));
    }

    public function update(Request $request, DetalleCompra $detalleCompra)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'fecha_compra' => 'required|date',
            'cantidad_producto' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal_compra' => 'required|numeric|min:0',
            'total_compra' => 'required|numeric|min:0'
        ]);
        $existingProveedor = Proveedor::where('id_compra', $request->id_compra)
            ->where('id_proveedor', $request->id_proveedor)
            ->where('id_producto', $request->id_producto)
            ->where('fecha_compra', $request->fecha_compra)
            ->where('cantidad_producto', $request->cantidad_producto)
            ->where('precio_unitario', $request->precio_unitario)
            ->where('subtotal_compra', $request->subtotal_compra)
            ->where('total_compra', $request->total_compra)
            ->first();

        if ($existingProveedor) {
            return redirect()->route('admin.compras.index')->with('message', [
                'type' => 'error',
                'text' => 'La compra ya existe en la base de datos.'
            ]);
        } else {
            $detalleCompra->id_usuario = $request->id_usuario;
            $detalleCompra->id_proveedor = $request->id_proveedor;
            $detalleCompra->id_producto = $request->id_producto;
            $detalleCompra->fecha_compra = $request->fecha_compra;
            $detalleCompra->cantidad_producto = $request->cantidad_producto;
            $detalleCompra->precio_unitario = $request->precio_unitario;
            $detalleCompra->subtotal_compra = $request->subtotal_compra;
            $detalleCompra->total_compra = $request->total_compra;
            $detalleCompra->save();
            return redirect()->route('admin.compras.index')->with('message', [
                'type' => 'success',
                'text' => 'La compra se ha actualizado correctamente.'
            ]);
        }
    }

    public function destroy($id_compra, $id_detalle_compra)
    {
        $detalleCompra = DetalleCompra::find($id_detalle_compra );
        $compra = Compras::find($id_compra);
        if (!$detalleCompra || !$compra) {
            return redirect()->back()->with('message', [
                'type' => 'error',
                'text' => 'La compra no existe en la base de datos.'
            ]);
        }

        $detalleCompra->delete();
        $compra->delete();
        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => 'La compra se ha eliminado correctamente.'
        ]);
    }
}
