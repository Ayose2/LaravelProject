<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session; 


class ProductosController extends Controller
{
    public function list($message = '')
    {
        $productos = Producto::all()->sortBy("nombre");
        if (Session::get('message')) {
            $message = Session::get('message');
            Session::forget('message');
        }
        return view('list', [
            'productos' => $productos,
            'message' => $message
        ]);            
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

    public function save(Request $request) 
    {
        $producto = new Producto();
        $message = "Hubo un error guardando el producto";
        if ($request->id) {
            $producto = Producto::find($request->id);
        }
        $producto->nombre = ucfirst($request->nombre);
        $producto->precio = $request->precio;
        $producto->observaciones = ucfirst($request->observaciones);
        if ($producto->save()) {
            $producto->categorias()->sync($request->categoria);
            $producto->almacenes()->sync($request->almacen);
            $message = "El producto fue guardado con exito";
        }
       
        return redirect('/')->with('message',$message);
    }

    public function remove(Request $request) 
    {
        $id = $request->id;
        $message = "Hubo un error borrando el producto, el producto no ha sido eliminado";
        $producto = Producto::find($id);
        if ($producto) {
            $producto->delete();
            $message = "El producto ha sido eliminado con exito";
        }
        return redirect('/')->with('message',$message);
    }
}
