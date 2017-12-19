<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable = [
        'genre_title'
    ];

    public function item()
    {
        return $this->belongsToMany('App\Item', 'genre_item');
    }
}
