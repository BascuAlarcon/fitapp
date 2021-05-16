@extends('layout.master')

@section('main')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=" {{ route('inicio') }} ">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href=" {{ route('productos.index') }} ">Productos</a></li>
     {{--  <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
    </ol>
  </nav>
    <div class="container background-color-3">
        <div class="row m-1 justify-content-end">
            @foreach($productos as $producto)
            <div class="col mt-2 mb-2 col-lg-3">
                <div class="card card-productos">
                    <div class="card-header text-center">
                        <p>{{ $producto->nombre }}</p>
                    </div>
                    <img src="{{Storage::url($producto->imagenes->first()->ruta)}}" class="card-img-top">

                    <div class="card-body">
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver Detalles</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection