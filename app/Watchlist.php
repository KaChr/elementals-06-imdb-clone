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
}
