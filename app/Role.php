<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'person_id',
        'actor',
        'director'
    ];
    public function people(){
        return $this->belongsTo('App\Person');
    }
}
