<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gates

        // retornar un verdadero abre el gate, y un falso lo cierra

        Gate::define('usuarios-listar', function($usuario){
            return $usuario->role_id == 1;
        });

        Gate::define('productos-crear', function($usuario){
            return $usuario->role_id == 1;
        });

        Gate::define('papelera-mostrar', function($usuario){
            return $usuario->role_id == 1;
        });
    }
}
