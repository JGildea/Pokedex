<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type1');
            $table->string('type2')->nullable();
            $table->float('height', 6 , 2);
            $table->float('weight', 6 , 2);
            $table->string('ability1');
            $table->string('ability2')->nullable();
            $table->string('ability3')->nullable();
            $table->string('egg_group1');
            $table->string('egg_group2')->nullable();
            $table->integer('hp');
            $table->integer('speed');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('special_attack');
            $table->integer('special_defense');
            $table->string('genus');
            $table->string('description',226);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}
