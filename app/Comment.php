<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'author_id',
        'review_id',
        'body',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'users');
    }

    public function review()
    {
        return $this->belongsTo('App\Review', 'reviews');
    }
}
