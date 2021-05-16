<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* 
    CONSTRUCTOR DEL CONTROLLER
    Todos los controllers se basan en Controller.php, todos los demás se heredan de este 
    Este constructor esta en App\Http\Middleware\Authenticate
    Para invocar al constructor se usa __ 
     */
    /* public function __construct(){
        $this->middleware('auth');
    } */
}
