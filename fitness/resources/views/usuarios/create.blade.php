@extends('layout.master')

@section('main')

<div class="row mt-2">
    <div class="col-6 mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white">Crear Cuenta</div>
            <div class="card-body">
                <form method="post" action="{{ route('usuarios.store') }}"> 
                    @csrf
                    <div class="form-group">
                        <label for="correo" class="text-style-2 ">Correo Electronico</label>
                        <input type="email" id="correo" name="correo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="text-style-2">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="text-style-2">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sexo" class="text-style-2">Sexo</label>
                        <select class="form-control" name="sexo" id="sexo">
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-style-2" >Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="region" class="text-style-2" >Region</label>
                        <select name="region" id="region" class="form-control">
                            @foreach ( $regione as $region )
                                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Crear Cuenta</button>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection