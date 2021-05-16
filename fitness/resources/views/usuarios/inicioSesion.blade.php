@extends('layout.master')

@section('main')

<div class="row">
  <div class="col-6 offset-3">
      <div class="card mt-5">
          <div class="card-header bg-dark text-white">DOW202</div>
          <div class="card-body">
              <h5 class="card-title">Inicio de sesion</h5>
              <form method="POST" action="{{ route('usuarios.login') }}">
                  @csrf
                  <div class="form-group">
                      <label for="correo">Correo Electronico</label>
                      <input type="text" id="correo" name="correo" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="password">Contraseña</label>
                      <input type="password" id="password" name="password" class="form-control">
                  </div>
                  <div class="form-group text-right">
                        <a href="{{ route('inicio')}}" class="btn btn-warning">Volver</a>
                        <a href="{{ route('usuarios.create')}}" class="btn btn-secondary">Crear Cuenta</a>
                        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                  </div>
              </form>
          </div>
      </div>
      
      {{-- VALIDACIONES --}}
      @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
      @endif

  </div>
</div>
@endsection