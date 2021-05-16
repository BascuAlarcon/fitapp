@extends('layout.master')

@section('main')
    <h3>Descubre los cientos de productos que tenemos</h3>
    <div class="container">
        <div class="row mt-2">
            @foreach ( $categorias as $categoria )
                <div class="col">
                    <div class="card cardbody">
                        <div class="card-header">
                            <a href=" {{-- Un nuevo controlador, que nos lleve a una vista donde se lista según categoria --}}">{{ $categoria->nombre }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>    
@endsection