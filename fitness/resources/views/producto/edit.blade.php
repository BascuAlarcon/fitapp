@extends('layout.master')

@section('main')
    <div>
        <h3>Editar Producto</h3>
        <div class="row">
            <div class="col-lg-7 container-edit">
                <form method="POST" action="{{ route('productos.update', $producto->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value={{ $producto->nombre }}>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" value={{ $producto->descripcion }}>
                    </div>
                    <div class="form-group">
                        <label for="precio">precio</label>
                        <input type="number" id="precio" name="precio" class="form-control" value={{ $producto->precio }}>
                    </div>
                    <div class="form-group">
                        <label for="stock">stock</label>
                        <input type="number" min=0 id="stock" name="stock" class="form-control" value={{ $producto->stock }}>
                    </div>
                    <div class="form-group">
                        <label for="descuento">descuento</label>
                        <input type="number" min=0 id="descuento" name="descuento" class="form-control" value={{ $producto->descuento }}>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-warning">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     
@endsection