<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function pokemon()
    {
        return $this->belongsToMany(pokemon::class, 'pokemon_types');
    }

    public $timestamps = false;
}
