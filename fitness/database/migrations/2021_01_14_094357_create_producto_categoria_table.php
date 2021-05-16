<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_categoria', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id');         // No autoincrementan
            $table->unsignedBigInteger('producto_id');

            // PK compuesta
            $table->primary(['categoria_id', 'producto_id']);   

            // Claves foraneas
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_categoria');
    }
}
