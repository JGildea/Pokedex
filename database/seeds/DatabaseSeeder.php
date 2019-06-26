<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(PokemonTableSeeder::class);
        $this->call(AbilityTableSeeder::class);
        $this->call(EggGroupTableSeeder::class);
        $this->call(TypeTableSeeder::class);



//        Model::reguard();
        
    }
}
