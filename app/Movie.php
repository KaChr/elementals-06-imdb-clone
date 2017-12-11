<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $fillable = [
        'title',
        'summary',
        'release_date',
        'runtime',
        'rating',
        'poster'
    ];

    public function genre(){
        return $this->hasMany('App\GenreMovie');
    }
    public function actor(){
        return $this->hasMany('App\ActorMovie');
    }
    public function director(){
        return $this->hasMany('App\DirectorMovie');
    }
}
