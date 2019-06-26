<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class pokemon_type extends Pivot
{
    protected $guarded = [];


    public $timestamps = false;
}
