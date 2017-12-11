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
        return $this->belongsToMany('App\GenreMovie');
    }
    public function actor(){
        return $this->belongsToMany('App\ActorMovie');
    }
    public function director(){
        return $this->belongsToMany('App\DirectorMovie');
    }
}
