<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    /* protected $primaryKey = 'rut'; */      // cuando no se llama id        
    /* protected $keyType = 'string'; */      // cuando la pk es un string
    /* protected $incrementing = false; */    // cuando la pk no autoincrementa

    public function categorias(){
        return $this->belongsToMany('App\Models\Categoria');
    }
    /* Forma 1: Para acceder a más campos de la tabla pivote, se coloca dentro del metodo withPivot en forma de array
    return $this->belongsToMany('App\Models\Categoria')->withPivot('campo1','campo2','etc'); 
    */

    /* Forma 2: filtramos desde acá con un where 
    public function categoriasCampos(){
        return $this->belongsToMany('App\Models\Categoria')->wherePivot('campo1',$campo1);
    }
    */

    public function imagenes(){
        return $this->hasMany('App\Models\Imagene');
    }
}
