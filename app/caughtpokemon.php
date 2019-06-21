<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class caughtpokemon extends Pivot
{
    protected $guarded = [];


    public $timestamps = false;
}
