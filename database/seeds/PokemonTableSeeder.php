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
 //           $array = $obj->types;
//            dd(count($obj->types));
            for( $i = 0; $i < count($obj->types); $i++){
                 //if($obj->types[$i] != null){
                    ${'type'.($i+1)}= $obj->types[$i];
                 //}
            }
            for( $i = 0; $i < count($obj->abilities); $i++){
                //if($obj->abilities[$i] != null){
                    ${'ability'.($i+1)} = $obj->abilities[$i];
                //}
             }
        
//            dd($pokeArray);
            for( $i = 0; $i < count($obj->egg_groups); $i++){
               //if($obj->egg_group[$i] != null){
                    ${'egg_group'.($i+1)} = $obj->egg_groups[$i];
               //}
            }
            //dd($obj->stats->hp);
            //$stats = json_decode($obj->stats);
            //dd($obj->stats->special_attack);
            pokemon::create(array(
                'id' => $obj->id,
                'name' => $obj->name,

                // for( $i = 0; $i < count(array($obj->types)); $i++){
                //     'type'.$i => array($obj->types)->$i;
                // }
//                'types' => $obj->types,
                'type1' => $type1,
                'type2' => $type2,
                'height' => $obj->height,
                'weight' => $obj->weight,
                'ability1' => $ability1,
                'ability2' => $ability2,
                'ability3' => $ability3,
//                'abilities' => $obj->abilities,
                // for( $i = 0; $i < count(array($obj->abilities)); $i++){
                //     'ability'.$i => array($obj->abilities)->$i;

                // }
//                'egg_groups' => $obj->egg_groups,
                // for( $i = 0; $i < count(array($obj->egg_groups)); $i++){
                //     'egg_group'.$i => array($obj->egg_groups)->$i;
                // }
//                'stats' => $obj->stats,
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
