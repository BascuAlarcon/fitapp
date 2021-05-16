@extends('layout.master')

@section('main')
    <div class="row mt-1">
      <div class="col col-xl-12 mx-auto">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('inicio')}}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('productos.index')}}">Productos</a></li>
          <li class="breadcrumb-item"><a href=" {{-- {{ route('') }} --}}"> {{ $producto->categorias[0]->nombre }} </a></li>
          <li class="breadcrumb-item"><a href="#"> {{ $producto->nombre }}</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                  {{-- Deviese ir un CARROUSEL que muestre todas las imagenes relacionadas --}}
                  <div class="container-card d-block" style="width: 500px">
                    <img class="card-img-top"src="{{ Storage::url($producto->imagenes->first()->ruta)}}">
                  </div>
                  <div class="d-block">
                    <h5 class="card-title"> {{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p class="card-text"> Categoria: {{ $producto->categorias[0]->nombre }}</p>
                    @if ($producto->descuento > 0)
                      <p class="card-text"> Precio antes: {{ $producto->precio }}</p>
                      <p class="card-text"> Precio hoy: {{ $producto->precio }} </p>
                    @else
                      <p class="card-text"> Precio antes: {{ $producto->precio }} </p>                      
                   @endif

                    <p class="card-text"> Stock: {{$producto->stock }}</p>
                  <p>Unidades a comprar: </p>
                  <div class="float-right ">
                      <a href="{{ route('productos.index') }}" class="btn btn-outline-primary">Volver</a>
                      <button class="btn btn-primary">Comprar</button>
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-5">
      <div class="col">
        ¡ Otros productos relacionados !
      </div>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="borrarProductoModal" tabindex="-1" role="dialog" aria-labelledby="borrarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="borrarProductoModalLabel">Confirmar borrado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Desea borrar al producto {{ $producto->nombre }}?
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ route('productos.destroy', $producto->id) }}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar Producto</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection