<?php

use Illuminate\Database\Seeder;
use App\Egg_group;
class EggGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('egg_groups')->delete();
        $json = File::get("database/data/pokemon.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            for( $i = 0; $i < count($obj->egg_groups); $i++){
                    $Egg_group = $obj->egg_groups[$i];
                    $temp = Egg_group::firstOrCreate(['name'=> $Egg_group]);
                    $temp->pokemon()->attach($obj->id);
            }
            
        }
    }
}
