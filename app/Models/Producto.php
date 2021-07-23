<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = false;

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'productos_categorias', 'producto', 'categoria');
    }

    public function almacenes()
    {
        return $this->belongsToMany(Almacen::class, 'productos_almacenes', 'producto', 'almacen');
    }

}
