<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// agregamos estos dos use para poder 
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use DateTime;   // clase de PHP

class Usuario extends Authenticable
{
    use HasFactory;
    use Notifiable;
    protected $table = "usuarios";
    protected $primaryKey = "correo";         // cuando la pk no es un id
    public $incrementing = false;               // es un campo que no autoincrementa
    protected $keyType = "string";              // no es integer    
    public $timestamps = false;

    public function regione(){
        return $this->belongsTo('App\Models\Regione');
    }

    public function roles(){
        return $this->belongsTo('App\Models\Rol');
    }

    public function registrarUltimoLogin(){
        $this->ultimo_login = new DateTime('NOW');
        $this->save();
    }
}
