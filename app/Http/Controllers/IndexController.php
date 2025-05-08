<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Unit;

class IndexController extends Controller

{
    public function producto()
    {        
        $unidades = Unit::all();
        $categorias = Category::all();
        return view('admin.productos', compact('categorias','unidades'));
    }
}
