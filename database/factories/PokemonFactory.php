<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\pokemon;
use Faker\Generator as Faker;

$factory->define(pokemon::class, function (Faker $faker) {
    return [
            'name'=> $faker->text(),
            'types'=> $faker->text(),
            'height'=> $faker->randomDigit,
            'weight'=> $faker->randomDigit,
            'abilities'=> $faker->text(),
            'stats'=> $faker->text(),
            'genus'=> $faker->text(),
            'description'=> $faker->text(),
        //
    ];
});
