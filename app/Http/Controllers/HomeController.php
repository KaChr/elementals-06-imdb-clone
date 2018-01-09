<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Item;
use App\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get X movies with highest rating
        $featured = Movie::orderBy('rating', 'desc')->limit(3)->get();

        foreach($featured as $feature) {
            $item[] = Item::find($feature->item_id);
        }
        
        // Get latest reviews
        
        // $reviews = Review::orderBy('reviews.created_at', 'desc')
        //     ->join('users', 'author_id', '=', 'users.id')
        //     ->join('movies', 'reviews.item_id', '=', 'movies.item_id')
        //     ->select('reviews.*', 'movies.poster', 'reviews.item_id')
        //     ->limit(4)->get();

        $reviews = Review::orderBy('reviews.created_at', 'desc')
            ->join('users', 'author_id', '=', 'users.id')
            ->join('movies', 'reviews.item_id', '=', 'movies.item_id')
            ->limit(2)->get(['reviews.*', 'users.name', 'movies.poster', 'reviews.rating AS review_rating']);

        return view('home', [
            'featured' => $featured, 
            'item' => $item, 
            'reviews' => $reviews]);
    }
}
