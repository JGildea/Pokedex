<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pokemon extends Model
{
    // protected $casts = [
    //     'types' => 'array',
    //     'abilities' => 'array',
    //     'egg_groups' => 'array'
    // ];
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class, 'caughtpokemon');
    }

    public $timestamps = false;
}
