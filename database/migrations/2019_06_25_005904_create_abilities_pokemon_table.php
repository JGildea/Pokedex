<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilitiesPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities_pokemon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pokemon_id');
            $table->unsignedBigInteger('ability_id');

            $table->foreign('pokemon_id')->references('id')->on('pokemon');
            $table->foreign('ability_id')->references('id')->on('abilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abilities_pokemon');
    }
}
