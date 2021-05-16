@extends('layout.master')

@section('main')
    <h3>Productos por categoria</h3>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            @foreach ($productos as $producto)
              <div class="card">
                <img src="{{ Storage::url($producto->imagen) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"> {{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <div>
                        <a href="{{ route('categorias.index') }}" class="btn btn-outline-primary">Volver</a>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection