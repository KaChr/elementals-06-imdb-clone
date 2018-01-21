<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    //
    protected $fillable = [
        'item_id',
        'user_id',
        'watched'
    ];

    protected $primaryKey = 'item_id';

    // public function item(){
    //     return $this->belongsTo('App\Item', 'items');
    // }

    public function user() 
    {

    }

    public function movies() 
    {
        return $this->hasMany('App\Movie', 'item_id', 'item_id');
    }

    public function tvshows() 
    {

    }
}
