<?php

use Illuminate\Database\Seeder;
use App\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        $json = File::get("database/data/pokemon.json");
        $data = json_decode($json);
        $keycollection = collect($data)->pluck('types','id');
        $array_flattened_unique = $keycollection->flatten()->unique();
        
        foreach ($array_flattened_unique as $obj) {
            $type = Type::create(['name'=>$obj]);
            $keys = array_map('intval',array_keys(array_dot($keycollection),$obj));
            $type->pokemon()->sync($keys);       
        }
    }
}
