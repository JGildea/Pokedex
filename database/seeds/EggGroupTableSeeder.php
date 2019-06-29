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
        $keycollection = collect($data)->pluck('egg_groups','id');
        $array_flattened_unique = $keycollection->flatten()->unique();

        foreach ($array_flattened_unique as $obj) {
            $egg_group = Egg_group::create(['name'=>$obj]); 
            $keys = array_map('intval',array_keys(array_dot($keycollection),$obj));
            $egg_group->pokemon()->sync($keys);       
        }
    }
}
