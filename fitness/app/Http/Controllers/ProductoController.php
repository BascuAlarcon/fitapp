<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Imagene;
use Illuminate\Http\Request;
use App\Http\Requests\ProductosRequest;  // request para hacer validaciones //
use Gate;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    public function listar()
    {
        if(Gate::denies('productos-crear')){
            return redirect()->route('inicio');
        }
        $categorias = Categoria::all();
        $productos = Producto::all();
        return view('producto.listar', compact('productos', 'categorias'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('productos-crear')){
            return redirect()->route('inicio');
        }
        $categorias = Categoria::all();      // para usar categorias, tenemos que hacer un import (6)
        return view('producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // reemplazamos el request normal, por el que tenemos nosotros con validaciones //
    public function store(ProductosRequest $request)
    {
    /* 1ra accion: insertar los datos en la tabla producto. */
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->descuento = $request->descuento;
        $producto->save();
        // Para utilizar una imagen tenemos que utilizar primer el comando php artisan storage:link //
        // store hace referencia a donde esta guardado el archivo. Entonces en imagen se guarda la dirección y el nombre del archivo //
        /* $producto->imagen = $request->imagen->store('public/productos');  */
        if ($request->imagen != null ){
            $imagen = new Imagene;
            $imagen->producto_id = $producto->id;
            $imagen->ruta = $request->imagen->store('public/productos');
            $imagen->save();
        }

    
    /* 2da accion: Una vez insertados los datos, tomamos el id del nuevo producto y lo insertamos en la tabla pibote. */
        $producto->categorias()->attach($request->categoria);
    
        return redirect(route('productos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit', compact('producto'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        // sobreescribir datos del producto
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->descuento = $request->descuento;

        // guardar cambios en BD
        $producto->save();
        // redirect
        return redirect()->route('productos.show', $producto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function borrados(){
        $productos = Producto::onlyTrashed()->get();
        return view('producto.borrados', compact('productos'));
    }

    public function restablecer($producto_id){
        $producto = Producto::withTrashed()->find($producto_id);
        $producto->restore();
        return redirect()->route('productos.index');
    }

    public function inicio(){
        $productosCreat = Producto::take(4)->orderBy('created_at', 'desc')->get();
        $productosDesc = Producto::take(4)->orderBy('descuento', 'desc')->get();
        $productosVend = Producto::take(4)->orderBy('vendidos', 'desc')->get();
        return view('home.index', compact('productosCreat', 'productosDesc', 'productosVend'));    
    }

}
