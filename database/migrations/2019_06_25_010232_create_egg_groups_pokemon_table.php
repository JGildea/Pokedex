<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEggGroupsPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egg_groups_pokemon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pokemon_id');
            $table->unsignedBigInteger('egg_group_id');

            $table->foreign('pokemon_id')->references('id')->on('pokemon');
            $table->foreign('egg_group_id')->references('id')->on('egg_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egg_groups_pokemon');
    }
}
