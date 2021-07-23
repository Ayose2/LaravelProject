@extends('layouts.master')

@section('title', 'Listado de productos')

@section('content')
  @include('removeproduct')

  @if($message)
    <div class="alert alert-warning mt-5" role="alert" id="info-message">
      {{ $message }}
    </div>
  @endif

  <input class="form-control mt-3" id="search" type="text" placeholder="Buscar producto..">
  <ol class="list-group list-group-numbered mt-2 overflow-auto mh-100" id="list">
    @foreach ($productos as $producto)
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div class="font-weight-bold text-uppercase nombre-producto">
            {{ $producto->nombre }}
          </div>
          <p><small>{{ $producto->observaciones }}</small></p>
          @foreach($producto->categorias as $categoria)
            <span class="badge bg-success rounded-pill text-white"> {{ $categoria->nombre }}</span>
          @endforeach
          @foreach($producto->almacenes as $almacen)
            <span class="badge bg-info rounded-pill text-white"> {{ $almacen->nombre }}</span>
          @endforeach
        </div>
        <div>
          <span class="badge bg-danger rounded-pill text-white d-block">{{ $producto->precio }}€</span> 
          <div class="mt-5">
            <a href="/producto/edit/{{ $producto->id }}" data-toggle="tooltip" data-placement="top" title="Editar producto"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
            <a class="ml-2" href="javascript:eliminarProducto({{ $producto->id }});" data-toggle="tooltip" data-placement="top" title="Borrar producto"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
          </div>
        </div>       
      </li>
    @endforeach
  </ol>
@endsection

@section('scripts')
  <script src="{{ asset('js/list.js') }}" defer></script>
@endsection