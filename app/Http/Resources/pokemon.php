<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class pokemon extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'types' => $this->types->pluck('name'),
            'height' => $this->height,
            'weight' => $this->weight,
            'abilities' => $this->abilities->pluck('name'),
            'egg_groups' => $this->eggGroups->pluck('name'),
            'stats' => [
                'hp'=>$this->id,
                'speed' => $this->speed,
                'attack' => $this->attack,
                'defense' => $this->defense,
                'special_attack' => $this->special_attack,
                'special_defense' => $this->special_defense,
            ],
            'genus' => $this->genus,
            'description' => $this->description,

        ];    
    }
}
