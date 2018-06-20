<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor');
            $table->unsignedInteger('estudiante_id');
            $table->unsignedInteger('actividad_id');
            $table->unsignedInteger('curso_id');
            
            $table->foreign('actividad_id')
                  ->references('id')->on('actividades')
                  ->onDelete('cascade');
            
            $table->foreign('estudiante_id')
                  ->references('user_id')->on('estudiantes')
                  ->onDelete('cascade');
            
            $table->foreign('curso_id')
                  ->references('id')->on('cursos')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('calificaciones');
    }
}
