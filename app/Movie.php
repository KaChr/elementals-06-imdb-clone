<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Movie extends Model
{
    use Sortable;
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

    public $sortable = ['title', 'rating', 'release_date'];
    protected $primaryKey = 'item_id';
    
    public $incrementing = [false];

    public function item(){
        return $this->belongsTo('App\Item', 'items');
    }

}
