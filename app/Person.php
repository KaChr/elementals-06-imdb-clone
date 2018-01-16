<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'dob',
        'city'
    ];

    public function itemsActor()
    {
        return $this->belongsToMany('App\Item', 'actor_character_item');
    }

    public function itemsDirector()
    {
        return $this->belongsToMany('App\Item', 'director_item');
    }
    
    public function roles()
    {
        return $this->hasOne('App\Role');
    }

    public function characters()
    {
        return $this->belongsToMany('App\Character', 'actor_character_item');
    }
}
