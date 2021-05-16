<?php

namespace App\Http\Controllers;

use App\Models\{Usuario, Rol};
use App\Models\Regione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Gate; // para aplicar un Gate global, se hace en el constructor

class UsuarioController extends Controller
{
    
    public function __construct(){  // de esta forma se llama al constructor de un controller //
        $this->middleware('auth')->except(['login', 'inicioSesion', 'create', 'store', 'cancelar', 'activar']); // se debe estar autentificado excepto para estos METODOS //
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Gate::denies('usuarios-listar')){
            return redirect()->route('inicio');
        }


        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        $regione = Regione::all();
        return view('usuarios.create', compact('regione','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = New Usuario();
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->sexo = $request->sexo;
        $usuario->regione_id = $request->region;
        $usuario->role_id = 2;
        $usuario->estado = 1;
        $usuario->save();
        return redirect()->route('usuarios.inicioSesion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $regione = Regione::all();
        return view('usuarios.edit', compact('regione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->correo = $request->correo;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->sexo = $request->sexo;
        $usuario->regione_id = $request->region;
        /* $usuario->rol_id = $request->id; */
        $usuario->save();
        return redirect()->route('inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function inicioSesion(){
        return view('usuarios.inicioSesion');
    }

    public function login(Request $request){
        // modificamos unas cosas en el modelo Usuario y en Config/auth
        // vamos a atrapar el usuario y la contraseña del formulario//
        /* $credenciales = $request->only('correo','password'); */
        // chequeamos si son correctas //
        // El metodo attempt chequea contra la bd, toma la pw la convierte en un hash, en caso de que todo este ok, el if es true
        if(Auth::attempt(['correo'=>$request->correo, 'password'=>$request->password, 'estado'=>true])){   // Tenemos que agregar un use
            $usuario = Usuario::where('correo', $request->correo)->first();
            $usuario->registrarUltimoLogin();
            return redirect()->route('inicio');
        }else{
            return redirect()->route('usuarios.inicioSesion');
            /* return back()>withErrors('Credenciales Incorrectas'); */
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('usuarios.inicioSesion');
    }

    public function cancelar(){
        return redirect()->route('inicio');
    }

    public function activar(Usuario $usuario){
        $usuario->estado = $usuario->estado?0:1;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }
}
