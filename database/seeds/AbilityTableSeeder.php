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
                    $temp = Ability::firstOrCreate(['name'=> $ability]);
                    $temp->pokemon()->attach($obj->id);

            }
            
        }
    }
}
