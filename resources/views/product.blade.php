@extends('layouts.master')

@section('title', 'Crear producto')

@section('content')
    <form action="/producto/save" method="post" class="mt-5" id="form-producto">
        @csrf
        
        @if ($producto && $producto->id)
            <input type="hidden" class="form-control" name="id"  id="id" value="{{ $producto->id }}">
        @endif
        
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre del producto *</label>
                <input type="text" class="form-control" id="nombre" value="{{$producto && $producto->nombre ? $producto->nombre : ''}}" name="nombre" placeholder="Introduzca aquí el nombre del producto">
                <div class="invalid-feedback" id="nombre-feedback">
                    El nombre es obligatorio y tiene que tener minimo 3 caracteres
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="precio">Precio del producto (€) *</label>
                <input  type="number" step="any" class="form-control" value="{{$producto && $producto->precio ? $producto->precio : ''}}" name="precio" id="precio" placeholder="0.00">
                <div class="invalid-feedback" id="precio-feedback">
                    El precio del producto es obligatorio
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="form-group col-md-6">
                <label for="almacen" class="d-block">Almacen *</label>
                <select class="selectpicker"   data-live-search="true" multiple name="almacen[]" id="almacen" data-width="100%">
                    @foreach ($almacenes as $almacen)
                        <option {{ $producto && $producto->almacenes && in_array($almacen->id, $producto->almacenes->pluck('id')->toArray()) ? 'selected' : ''}} value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback" id="almacen-feedback">
                    Seleccionar almacen del producto es obligatorio
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="categoria" class="d-block">Categoría *</label>
                <select class="selectpicker"  data-live-search="true"  multiple name="categoria[]" id="categoria" data-width="100%">
                    @foreach ($categorias as $categoria)
                        <option {{ $producto && $producto->categorias && in_array($categoria->id, $producto->categorias->pluck('id')->toArray()) ? 'selected' : ''}} value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback" id="categoria-feedback">
                    Seleccionar categoria del producto es obligatorio
                </div>
            </div>
        </div>
        

        <div class="row mt-2">
            <div class="form-group col-md-12">
                <label for="observaciones">Observaciones *</label>
                <textarea placeholder="Introduzca aqui las observaciones acerca del producto..." class="form-control" value="{{$producto && $producto->observaciones ? $producto->observaciones : ''}}" id="observaciones" name="observaciones" rows="3">{{ $producto && $producto->observaciones ? $producto->observaciones : ''}}</textarea>
                <div class="invalid-feedback" id="observaciones-feedback">
                   Las observaciones acerca del producto son obligatorias
                </div>
            </div>
        </div>
        
      
        <a href="/" class="btn btn-danger float-right ml-2"> Cancelar </a>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </form>
@endsection


@section('scripts')
  <script src="{{ asset('js/product.js') }}" defer></script>
@endsection