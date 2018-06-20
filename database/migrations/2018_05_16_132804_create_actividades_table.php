<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->double('porcentaje');
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('periodo_id');
            
            $table->foreign('periodo_id')
                  ->references('id')->on('periodos')
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
        Schema::dropIfExists('actividades');
    }
}
