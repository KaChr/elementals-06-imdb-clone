<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'id',
        'item_id',
        'author_id',
        'title',
        'body',
        'rating',
        'created_at'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item', 'items');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users');
    }
}
