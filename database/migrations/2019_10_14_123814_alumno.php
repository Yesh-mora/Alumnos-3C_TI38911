<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('alumno', function (Blueprint $table) {
            $table->string('matricula',7)->primary();
            $table->string('nombre',30);
            $table->string('apellidos',30);
            $table->string('correo',30);
            $table->integer('carrera')->unsigned();
            
            $table->timestamps();
            $table->foreign('carrera')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
