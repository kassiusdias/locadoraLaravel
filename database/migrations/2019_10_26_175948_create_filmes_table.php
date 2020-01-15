<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('sinopse');
            $table->string('imagem');
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
        Schema::dropIfExists('filmes');

        Schema::table('filmes', function (Blueprint $table) {
            $table->foreign('id_protagonista')->references('id')->on('atores');
            $table->foreign('id_genero')->references('id')->on('generos');
        });
    }
}
