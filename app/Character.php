<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'id',
        'character'
    ];

    public function Actor()
    {
        return $this->belongsToMany('App\Person', 'actor_character_item');
    }

    public function Item()
    {
        return $this->belongsToMany('App\Person', 'actor_character_item');
    }
}
