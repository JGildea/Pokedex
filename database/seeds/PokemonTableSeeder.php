<?php

use Illuminate\Database\Seeder;
use App\pokemon;
class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pokemon')->delete();
        $json = File::get("database/data/pokemon.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            pokemon::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'height' => $obj->height,
                'weight' => $obj->weight,
                'hp'=> $obj->stats->hp,
                'speed'=> $obj->stats->speed,
                'attack'=> $obj->stats->attack,
                'defense'=> $obj->stats->defense,
                'special_attack'=> $obj->stats-> special_attack,
                'special_defense'=> $obj->stats-> special_defense,

                'genus' => $obj->genus,
                'description' => $obj->description                
            
            ));
  
            
        }
    }
}
