@extends('layout.master')

@section('hojas-estilo')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">
@endsection

@section('main')
    <div class="row mt-2">
        <div class="col col-lg-10 mx-auto">
            <table data-toggle="table" data-pagination="true" data-page-size="5" data-search="true" data-show-search-button="true" class="table table-responsive-sm table-light table-stripped table-hover">
                <thead>
                    <tr>
                        <th data-sortable="true">Email</th>
                        <th data-sortable="true">Nombre</th>
                        <th data-sortable="true">Último login</th>
                        <th data-sortable="true">Region</th>
                        <th data-sortable="true">Rol</th>
                        <th data-sortable="true">Estado</th>
                        <th>Modificar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->correo}}</td>
                        <td>{{$usuario->nombre}} {{$usuario->apellido}}</td>
                        <td>{{$usuario->ultimo_login}}</td>
                        <td>{{$usuario->regione->nombre}}</td>
                        <td>{{$usuario->role_id}}</td>
                        @if ($usuario->activo == true)
                            <td>Enable</td>   
                        @endif
                        @if ($usuario->activo == false)
                            <td>Disable</td>
                        @endif
                                
                        <td>
                            @if (Auth::user()->correo != $usuario->correo)
                                <form method="POST" action="{{route('usuarios.activar', $usuario->correo)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="{{$usuario->estado?'Desactivar':'Activar'}} Usuario"> 
                                        <i class="fas fa-user-{{$usuario->estado?'slash':'check'}}"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/bootstrap-table-es-CL.js')}}"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
@endsection