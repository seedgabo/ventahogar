<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Residencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('ciudad_id')->nullable();
            $table->integer('barrio_id')->nullable();
            $table->string('tipo')->default('casa');
            $table->text('direccion')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('slogan')->nullable();
            $table->string('disponibilidad')->default("disponible");
            $table->integer("precio")->default(0);
            $table->string("tipo_venta")->default("venta"); // Arriendo,Venta
            $table->string('url_video')->nullable();
            $table->integer('default_photo')->nullable();
            $table->integer('metraje')->nullable()->default(100);
            $table->integer('baños')->nullable()->default(2);
            $table->integer('habitaciones')->nullable()->default(2);
            $table->integer('garaje')->nuallble()->default(1);
            $table->text('otros')->nullable();
            $table->boolean('visible')->default(true);
            $table->boolean('activo')->default(true);
            $table->boolean('destacado')->default(false);
            $table->timestamps();
            $table->softDeletes();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('residencias');
    }
}
