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

    public function types(){
        return $this->belongsToMany(Type::class, 'pokemon_types');
    }

    public function abilities(){
        return $this->belongsToMany(Ability::class, 'abilities_pokemon');
    }

    public function egg_groups(){
        return $this->belongsToMany(Egg_group::class, 'egg_groups_pokemon');
    }    

    protected $hidden = ['type1','type2','ability1','ability2','ability3','egg_group1','egg_group2'];
    public $timestamps = false;
}
