<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function roles()
    {
        return $this->belongsToMany('App\Movie');
    }
}
