<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvshow extends Model
{
    //
    protected $fillable = [
        'item_id',
        'title',
        'summary',
        'year',
        'runtime',
        'rating'
    ];

    protected $primaryKey = 'item_id';
    
    public $incrementing = [false];

    public function seasons()
    {
        return $this->hasMany('App\Season', 'seasons');
    }

    public function item()
    {
        return $this->belongsTo('App\Item', 'items');
    }
}
