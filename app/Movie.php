<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $fillable = [
        'id',
        'title',
        'summary',
        'release_date',
        'runtime',
        'rating',
        'poster'
    ];

    public function genres(){
        return $this->belongsToMany('App\Genre', 'genre_movie');
    }
    public function actors(){
        return $this->belongsToMany('App\Person', 'actor_movie');
    }
    public function directors(){
        return $this->belongsToMany('App\Person', 'director_movie');
    }
}
