<?php

$factory->define(App\caughtpokemon::class, function (Faker\Generator $faker) {
    return [
        'trainer_id' => $faker->randomNumber(),
        'pokemon_id' => $faker->randomNumber(),
    ];
});

$factory->define(App\pokemon::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'types' => $faker->word,
        'height' => $faker->randomFloat(),
        'weight' => $faker->randomFloat(),
        'abilities' => $faker->word,
        'stats' => $faker->word,
        'genus' => $faker->word,
        'description' => $faker->word,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});

