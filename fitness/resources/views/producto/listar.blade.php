@extends('layout.master')

@section('main')
    <div class="row">
        <div class="col-12 col-lg-4 order-lg-1">
            <div class="card">
                <div class="card-header">
                    Agregar Producto
                </div>
                @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('productos.store') }}">
                        @csrf
                        <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data"> {{-- enctype es para subir archivos --}}
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" >
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion') }}">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" id="precio" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" min=0 id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                            </div>
                            <div class="form-group">
                                <label for="descuento">Descuento</label>
                                <input type="number" min=0 id="descuento" name="descuento" class="form-control @error('descuento') is-invalid @enderror" value="{{ old('descuento') }}">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    @foreach ( $categorias as $categoria )
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" id="imagen" name="imagen" class="custom-file-input @error('descuento') is-invalid @enderror">
                                    <label for="imagen" class="custom-file-label" data-browse="Examinar">Seleccione una imagen</label>
                                </div>  
                            </div>
                            <div class="form-group">
                                <a href="{{ route('productos.index') }}" class="btn btn-warning">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Agregar Producto</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    

    {{-- Tabla --}}
        <div class="col-12 col-lg-8">
            <table class="table table-bordered table-stripped table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Vendidos</th>
                        <th>Descuentos</th>
                        <th>Categorias</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                @foreach ($productos as $num=>$producto)
                    <tr>
                        <td>{{ $num+1 }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->vendidos }}</td>
                        <td>{{ $producto->descuento }}</td>
                        <td>{{ $producto->categorias->first()->nombre }}</td>
                        
                        <td>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#productoBorrarModal{{$producto->id}}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                        <td>
                            <a href=" {{route('productos.edit', $producto->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Producto">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('productos.show', $producto->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ver Producto">
                                <i class="far fa-user-friends"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="productoBorrarModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmación de Borrado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <i class="fas fa-exclamation-circle text-danger" style="font-size: 2rem"></i>
                                    ¿Desea borrar el producto {{ $producto->nombre }}?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('productos.destroy', $producto->id ) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Borrar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
    </div>
 
@endsection

@section('scripts')
    <script>
        /* del elemento imagen, cuando cambie su contenido, realiza esta accion */
        $('#imagen').on('change', function(){
            var archivo = $(this).val().replace('C:\\fakepath\\',"");
            $(this).next('.custom-file-label').html(archivo);
        });
    </script>
@endsection