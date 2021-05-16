@extends('layout.master')

@section('main')
    <div class="body-style-1">
        <div class="row justify-content-end">
            <div class="col col-lg-4 m-4">
                <div class="container container-style-1">
                    <h1 class="text-style-1" style="text-align: center">Agregar Producto</h1>
                    {{-- MENSAJES DE ERROR --}}
                    @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- FORM --}}
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
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- typescript (creo) --}}
@section('scripts')
    <script>
        /* del elemento imagen, cuando cambie su contenido, realiza esta accion */
        $('#imagen').on('change', function(){
            var archivo = $(this).val().replace('C:\\fakepath\\',"");
            $(this).next('.custom-file-label').html(archivo);
        });
    </script>
@endsection