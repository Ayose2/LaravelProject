@extends('layouts.master')

@section('title', 'Crear producto')

@section('content')
    <form action="/producto/save" method="post" class="mt-5">
        @csrf
        
        @if ($producto && $producto->id)
            <input type="hidden" class="form-control" name="id"  id="id" value="{{ $producto->id }}">
        @endif

        <div class="form-group">
            <label for="nombre">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" value="{{$producto && $producto->nombre ? $producto->nombre : ''}}" name="nombre" placeholder="Introduzca aquí el nombre del producto">
        </div>
        <div class="form-group">
            <label for="precio">Precio del producto</label>
            <input  type="number" step="any" class="form-control" value="{{$producto && $producto->precio ? $producto->precio : ''}}" name="precio" id="precio" placeholder="0.00"> €
        </div>
        <div class="form-group">
            <select class="custom-select" multiple name="almacen[]" id="almacen">
                <option disabled>Almacenes</option>
                @foreach ($almacenes as $almacen)
                    <option selected="{{ $producto && in_array($almacen->id, (array) $producto->almacenes) ? 'true' : 'false'}}" value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="custom-select" multiple name="categoria[]" id="categoria">
                <option disabled>Categorias</option>
                @foreach ($categorias as $categoria)
                    <option selected="{{$producto && in_array($categoria->id, (array) $producto->categorias) ? 'true' : 'false'}}" value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea class="form-control" value="{{$producto && $producto->observaciones ? $producto->observaciones : ''}}" id="observaciones" name="observaciones" rows="3">{{ $producto && $producto->observaciones ? $producto->observaciones : ''}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop