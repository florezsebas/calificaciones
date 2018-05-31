<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('codigo')->primary();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('grupo_id');
            $table->string('codigo_acudiente')->default(null);
            
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('grupo_id')
                  ->references('id')->on('grupos')
                  ->onDelete('cascade');
                  
            $table->foreign('codigo_acudiente')
                  ->references('codigo')->on('acudientes')
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
        Schema::dropIfExists('estudiantes');
    }
}
