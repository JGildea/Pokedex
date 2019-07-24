<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EggGroup extends Model
{
    protected $guarded = [];

    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class,'eggGroups_pokemon');
    }

    public $timestamps = false;
}
