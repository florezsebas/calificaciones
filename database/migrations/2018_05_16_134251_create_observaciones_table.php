<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('estudiante_id');
            
            $table->foreign('curso_id')
                  ->references('id')->on('cursos')
                  ->onDelete('cascade');
            
            $table->foreign('estudiante_id')
                  ->references('user_id')->on('estudiantes')
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
        Schema::dropIfExists('observaciones');
    }
}
