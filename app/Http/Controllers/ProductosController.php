<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;


class ProductosController extends Controller
{
    public function list()
    {
        $productos = Producto::all();
        return view('list', ['productos' => $productos]);            
    }

    public function create()
    {
        return view('product', [
            'almacenes' => $this->getAlmacenes(),
            'categorias' => $this->getCategorias(),
            'producto' => []
        ]);            
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('product', [
            'almacenes' => $this->getAlmacenes(),
            'categorias' => $this->getCategorias(),
            'producto' => $producto
        ]);     
    }

    public function save(Request $request) {
        $producto = new Producto();
        if ($request->id) {
            $producto = Producto::find($request->id);
        }
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->observaciones = $request->observaciones;
        $producto->save();
        $producto->categorias()->sync($request->categoria);
        $producto->almacenes()->sync($request->almacen);
        return redirect('/');
    }
}
