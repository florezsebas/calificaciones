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
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('periodo_id');
            $table->string('codigo_estudiante');
            
            $table->foreign('curso_id')
                  ->references('id')->on('cursos')
                  ->onDelete('cascade');
                  
            $table->foreign('periodo_id')
                  ->references('id')->on('periodos')
                  ->onDelete('cascade');
            
            $table->foreign('codigo_estudiante')
                  ->references('codigo')->on('estudiantes')
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
