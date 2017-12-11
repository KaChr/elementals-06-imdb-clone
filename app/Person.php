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

    public function actor(){
        return $this->belongsToMany('App\ActorMovie');
    }
    public function director(){
        return $this->belongsToMany('App\DirectorMovie');
    }
    public function role(){
        return $this->hasOne('App\Role');
    }
}
