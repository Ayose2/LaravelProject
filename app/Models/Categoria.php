<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_categorias', 'categoria', 'producto');
    }

}
