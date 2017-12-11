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
}
