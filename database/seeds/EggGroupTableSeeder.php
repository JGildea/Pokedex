<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\EggGroup;
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
        $keyCollection = collect($data)->pluck('egg_groups','id');
        $array_flattened_unique = $keyCollection->flatten()->unique();

        foreach ($array_flattened_unique as $obj) {
            $egg_group = EggGroup::create(['name'=>$obj]);
            $keys = array_map('intval',array_keys(Arr::dot($keyCollection->toArray()),$obj));
            $egg_group->pokemon()->sync($keys);       
        }
    }
}
