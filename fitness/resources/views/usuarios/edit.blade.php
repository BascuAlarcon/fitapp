@extends('layout.master')

@section('main')
    <div class="row mx-auto">
        <div class="container">
            <div class="col-ms-12 col-lg-6 mx-auto p-3 mt-2 mb-2 background-color-3" style="box-shadow: 2px 2px 2px 2px #e0dede">
                <h3 class="text-title">Editar Cuenta</h3>
                {{-- MENSAJES DE ERROR --}}
                {{-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                {{-- FORM --}}  
                <form method="post" action="{{ route('usuarios.update', Auth::user()->correo) }}"> 
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="correo">Correo Electrnico</label>
                        <input type="email" id="correo" name="correo" class="form-control" value= {{ Auth::user()->correo }}>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value= {{ Auth::user()->nombre }}>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" value= {{ Auth::user()->apellido }}> 
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="form-control" name="sexo" id="sexo" value= {{ Auth::user()->sexo }}>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" value={{ Auth::user()->password }}>
                    </div>
                    <div class="form-group">
                        <label for="region">Region</label>
                        <select name="region" id="region" class="form-control" }}>
                            @foreach ( $regione as $region )
                                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn button-guardar">Guardar Configuración</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-warning" style="text-align: center; height: 50px">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection