<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $guarded = [];

    public function pokemon()
    {
        return $this->belongsToMany(pokemon::class, 'abilities_pokemon');
    }

    public $timestamps = false;

    protected $visible = ['name'];
}
