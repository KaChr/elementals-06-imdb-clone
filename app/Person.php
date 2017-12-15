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

    public function moviesActor(){
        return $this->belongsToMany('App\Movie', 'actor_movie');
    }
    public function moviesDirector(){
        return $this->belongsToMany('App\Movie', 'director_movie');
    }
    public function roles(){
        return $this->hasOne('App\Role');
    }
}
