<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ability_pokemon extends Pivot
{
    protected $guarded = [];


    public $timestamps = false;
}
