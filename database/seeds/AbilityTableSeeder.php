<?php

use Illuminate\Database\Seeder;
use App\Ability;
class AbilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abilities')->delete();
        $json = File::get("database/data/pokemon.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            for( $i = 0; $i < count($obj->abilities); $i++){
                   $ability = $obj->abilities[$i];
//               dd($abilites[$i]);
                    $temp = Ability::firstOrCreate(['name'=> $ability]);
                    $temp->pokemon()->attach($obj->id);

            }

            // pokemon::create(array(
            //     'id' => $obj->id,
            //     'name' => $obj->name,
            //     'type1' => $type1,
            //     'type2' => $type2,
            //     'height' => $obj->height,
            //     'weight' => $obj->weight,
            //     'ability1' => $ability1,
            //     'ability2' => $ability2,
            //     'ability3' => $ability3,
            //     'egg_group1' => $egg_group1,
            //     'egg_group2' => $egg_group2,

            //     'hp'=> $obj->stats->hp,
            //     'speed'=> $obj->stats->speed,
            //     'attack'=> $obj->stats->attack,
            //     'defense'=> $obj->stats->defense,
            //     'special_attack'=> $obj->stats-> special_attack,
            //     'special_defense'=> $obj->stats-> special_defense,

            //     'genus' => $obj->genus,
            //     'description' => $obj->description                
            
            // ));
            
        }
    }
}
