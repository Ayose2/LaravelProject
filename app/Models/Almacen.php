<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacenes';
    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_almacenes', 'almacen', 'producto');
    }

}
