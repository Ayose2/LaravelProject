<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductosController::class, 'list']);
Route::get('/producto/create', [ProductosController::class, 'create']);
Route::get('/producto/edit/{id}', [ProductosController::class, 'edit']);
Route::post('/producto/remove', [ProductosController::class, 'remove']);
Route::post('/producto/save', [ProductosController::class, 'save']);