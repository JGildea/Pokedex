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
        foreach ($data as $obj) {
            for( $i = 0; $i < count($obj->types); $i++){   
                    $Type = $obj->types[$i];
                    $temp = Type::firstOrCreate(['name'=> $Type]);
                    $temp->pokemon()->attach($obj->id);
            }

          
        }
    }
}
