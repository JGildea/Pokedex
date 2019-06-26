<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egg_group extends Model
{
    protected $guarded = [];
    
    public function pokemon()
    {
        return $this->belongsToMany(pokemon::class,'egg_groups_pokemon');
    }

    public $timestamps = false;
}
