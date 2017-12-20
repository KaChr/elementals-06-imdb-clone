<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $fillable = [
        'item_id',
        'title',
        'summary',
        'release_date',
        'runtime',
        'rating',
        'poster'
    ];

    protected $primaryKey = 'item_id';
    
    public $incrementing = [false];

    public function item(){
        return $this->belongsTo('App\Item', 'items');
    }

}
