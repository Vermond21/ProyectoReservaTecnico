<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tarea');
            $table->unsignedBigInteger('id_tecnico');
            $table->time('tiempo_inicio');
            $table->time('tiempo_fin');
            $table->date('fecha');
            $table->enum('estado', ['asignado', 'ejecutando', 'finalizado']);
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
            $table->text('observaciones')->nullable();;
            
            $table->foreign('id_cliente')->references('id')->on('personas');
            $table->foreign('id_tarea')->references('id')->on('tareas');
            $table->foreign('id_tecnico')->references('id')->on('personas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programaciones');
    }
}
