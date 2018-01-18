<?php

namespace App\Http\Controllers;

use App\Review;
use App\Movie;
use App\Item;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $movie = Movie::find($id);
        $item = Item::find($id);
        $user = Auth::user();


        return view('reviews.create', ['movie' => $movie, 'item' => $item, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $movie)
    {
        
        $review = new Review;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->item_id = $movie;
        $review->author_id = Auth::user()->id;
        $review->rating = $request->rating;

        $review->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($movie, Review $review)
    {
        $review = Review::find($review->id);
        $movie = Movie::find($movie);
        $item = Item::find($movie->item_id);
        $comments = Comment::all()->where('review_id', $review->id);

        return view('reviews.show', [
            'review' => $review,
            'movie' => $movie,
            'item' => $item,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
