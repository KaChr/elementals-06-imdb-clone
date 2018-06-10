<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'id',
        'type'
    ];

    public function movie()
    {
        return $this->hasOne('App\Movie', 'movies');
    }

    public function tvshow()
    {
        return $this->hasOne('App\Tvshow', 'item_id');
    }

    public function seasons()
    {
        return $this->hasMany('App\Season', 'seasons');
    }

    public function episodes()
    {
        return $this->hasMany('App\Episode', 'item_id');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Person', 'actor_character_item');
    }

    public function directors()
    {
        return $this->belongsToMany('App\Person', 'director_item');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'genre_item');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'reviews');
    }

    public function characters()
    {
        return $this->belongsToMany('App\Character', 'actor_character_item');
    }
}
