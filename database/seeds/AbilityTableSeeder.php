<?php

use Illuminate\Database\Seeder;
use App\Ability;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $keycollection = collect($data)->pluck('abilities','id');
        $array_flattened_unique = $keycollection->flatten()->unique();
        
        foreach ($array_flattened_unique as $obj) {
            $ability = Ability::create(['name'=>$obj]);
            $keys = array_map('intval',array_keys(Arr::dot($keycollection->toArray()),$obj));
            $ability->pokemon()->sync($keys);      
        }
    }
}
