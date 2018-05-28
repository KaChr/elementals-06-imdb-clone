<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //
    protected $fillable = [
        'item_id',
        'tvshow_id',
        'season_nr'
    ];

    protected $primaryKey = 'item_id';

    public $incrementing = [false];

    public function episodes()
    {
        return $this->hasMany('App\Episode', 'item_id');
    }

    public function tvshow()
    {
        return $this->belongsTo('App\Tvshow', 'tvshows');
    }

    public function item()
    {
        return $this->belongsTo('App\Item', 'items');
    }
}
