<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RolController, UsuarioController};
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HOME //
Route::get('/', [ProductoController::class, 'inicio'])->name('inicio');     /* Hay que hacer un import */


// USUARIOS //
Route::post('/usuarios/login', 'App\Http\Controllers\UsuarioController@login')->name('usuarios.login');
Route::get('/usuarios/logout', 'App\Http\Controllers\UsuarioController@logout')->name('usuarios.logout');
Route::get('/usuarios/create', 'App\Http\Controllers\UsuarioController@create')->name('usuarios.create');
Route::post('/usuarios', 'App\Http\Controllers\UsuarioController@store')->name('usuarios.store');
Route::get('/usuarios/{usuario}/edit', 'App\Http\Controllers\UsuarioController@edit')->name('usuarios.edit');
Route::put('/usuarios/{usuario}', 'App\Http\Controllers\UsuarioController@update')->name('usuarios.update');
Route::get('/usuarios', 'App\Http\Controllers\UsuarioController@cancelar')->name('usuarios.cancelar');
Route::get('/usuarios', 'App\Http\Controllers\UsuarioController@inicioSesion')->name('usuarios.inicioSesion');
Route::get('/usuarios/index', 'App\Http\Controllers\UsuarioController@index')->name('usuarios.index');
Route::post('/usuarios/{usuario}/activar', 'App\Http\Controllers\UsuarioController@activar')->name('usuarios.activar');
/* Route::get('/usuarios', UsuarioController::class, 'inicioSesion')->name('inicioSesion'); */

/* ROLES */
Route::resource('/roles', RolController::class);

// PRODUCTOS //
Route::get('/productos/borrados','App\Http\Controllers\ProductoController@borrados')->name('productos.borrados');
Route::get('/productos','App\Http\Controllers\ProductoController@index')->name('productos.index');
Route::get('/productos/listar', [ProductoController::class, 'listar'])->name('productos.listar');

Route::get('/productos/create', 'App\Http\Controllers\ProductoController@create')->name('productos.create');
Route::post('/productos', 'App\Http\Controllers\ProductoController@store')->name('productos.store');
Route::get('/productos/{producto}', 'App\Http\Controllers\ProductoController@show')->name('productos.show');
Route::delete('/productos/{producto}', 'App\Http\Controllers\ProductoController@destroy')->name('productos.destroy');
Route::get('/productos/{producto}/edit', 'App\Http\Controllers\ProductoController@edit')->name('productos.edit');
Route::put('/productos/{producto}', 'App\Http\Controllers\ProductoController@update')->name('productos.update');
Route::post('/productos/{producto}/restablecer', 'App\Http\Controllers\ProductoController@restablecer')->name('productos.restablecer');


// CATEGORIAS //
Route::get('/categorias', 'App\Http\Controllers\CategoriaController@index')->name('categorias.index');
Route::get('/categorias/create', 'App\Http\Controllers\CategoriaController@create')->name('categorias.create');
Route::post('/categorias', 'App\Http\Controllers\CategoriaController@store')->name('categorias.store');
Route::get('/categorias/{categoria}/productos', 'App\Http\Controllers\CategoriaController@productos')->name('categoria.productos');

// REDIRECT //
Route::redirect('/categoria', '/categorias');