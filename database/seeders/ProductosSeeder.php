<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $producto = DB::table('productos')->insertGetId([
            'nombre' => Str::random(10),
            'precio' => rand(1,100),
            'observaciones' => Str::random(10)
        ]);

        DB::table('productos_almacenes')->insert([
            'producto' => $producto,
            'almacen' => 1
        ]);

        DB::table('productos_categorias')->insert([
            'producto' => $producto,
            'categoria' => 1
        ]);

    }
}
