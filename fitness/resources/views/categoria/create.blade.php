@extends('layout.master')

@section('main')
    <h3>Agregar categoria</h3>

    <div class="row">
        <div class="col col-lg-10">
            <form method="POST" action="{{ route('categorias.store') }}"> 
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" >
                </div>
                <div class="form-group">
                    <label for="descripcion">descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion') }}"> 
                </div>
                <div class="form-group">
                    <a href="{{ route('categorias.index') }}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Agregar categoria</button>
                </div>
            </form>
        </div>
        {{-- Errores --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <p>Por favor solucione los siguientes problemas</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
@endsection

{{--  --}}
@section('scripts')
    <script>
        /* del elemento imagen, cuando cambie su contenido, realiza esta accion */
        $('#imagen').on('change', function(){
            var archivo = $(this).val().replace('C:\\fakepath\\',"");
            $(this).next('.custom-file-label').html(archivo);
        });
    </script>
@endsection