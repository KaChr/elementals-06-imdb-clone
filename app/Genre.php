<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable = [
        'genre_title'
    ];

    public function movie_genre(){
        return $this->belongsToMany('App\Movie', 'genre_movie');
    }
}
