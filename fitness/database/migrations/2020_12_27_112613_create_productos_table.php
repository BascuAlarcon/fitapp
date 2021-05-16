<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // CREA LA MIGRACIÓN //
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('descripcion');
            $table->integer('precio');
            $table->integer('stock');
            $table->integer('vendidos');
            $table->integer('descuento');
            $table->timestamps('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // DESHACER UNA MIGRACIÓN - ROLLBACK //
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
