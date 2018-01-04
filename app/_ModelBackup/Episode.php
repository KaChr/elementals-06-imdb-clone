<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    //
    protected $fillable = [
        'item_id',
        'season_id',
        'episode_nr',
        'title',
        'summary',
        'rating',
        'airdate'
    ];
    
    protected $primaryKey = 'item_id';

    public $incrementing = [false];

    public function item()
    {   
        return $this->belongsTo('App\Item', 'items');
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'seasons');
    }
}
