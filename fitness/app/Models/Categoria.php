<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Datebase\Eloquent\SoftDeletes;   // para el borrado lógico

// Si no seguimos la convención de laravel para el nombre de sus tablas y pk/fk, debemos hacer unos cambios al código //

class Categoria extends Model
{
    use HasFactory;
    // use SoftDeletes; // para el borrado lógico
    public $timestamps = false; // especificamos que no usaremos created_at y updated_at

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }
}
