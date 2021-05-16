@extends('layout.master')

@section('main')
    <div class="row m-1">
        <div class="col">
            <div class="table table-bordered table-stripped table-hover">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th></th>
                </tr>
                @foreach ( $productos as $producto )
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <form method="POST" action="{{ route('productos.restablecer', $producto->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Reestablecer Producto</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </div>
        </div>
    </div>
@endsection