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
        return $this->hasMany('App\ActorMovie');
    }
    public function director(){
        return $this->hasMany('App\DirectorMovie');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
}
