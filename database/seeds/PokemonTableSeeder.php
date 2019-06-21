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
            $type2 = $ability2 = $ability3 = $egg_group2 = null;

            for( $i = 0; $i < count($obj->types); $i++){

                    ${'type'.($i+1)}= $obj->types[$i];

            }
            for( $i = 0; $i < count($obj->abilities); $i++){

                    ${'ability'.($i+1)} = $obj->abilities[$i];

             }
        
        
            for( $i = 0; $i < count($obj->egg_groups); $i++){

                    ${'egg_group'.($i+1)} = $obj->egg_groups[$i];

            }

            pokemon::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'type1' => $type1,
                'type2' => $type2,
                'height' => $obj->height,
                'weight' => $obj->weight,
                'ability1' => $ability1,
                'ability2' => $ability2,
                'ability3' => $ability3,
                'egg_group1' => $egg_group1,
                'egg_group2' => $egg_group2,

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
