<?php

namespace App\Http\Controllers;

use App\Review;
use App\Movie;
use App\Item;
use App\Comment;
use App\Tvshow;
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
        $title = Movie::find($id);
        if($title === null) {
            $title = Tvshow::find($id);
        }
        $item = Item::find($id);
        $user = Auth::user();


        return view('reviews.create', ['title' => $title, 'item' => $item, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $item = Item::find($id);
        
        $review = new Review;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->item_id = $id;
        $review->author_id = Auth::user()->id;
        $review->rating = $request->rating; 

        $review->save();

        if($item->type === 'movie') {
            return redirect()->route('movies.reviews.show', [
                'title' => $id, 
                'review' => $review
            ]);
        }

        return redirect()->route('tvshows.reviews.show', [
            'id' => $id, 
            'review' => $review
        ]);

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
        $comments = Comment::where('review_id', $review->id)
        ->join('users', 'author_id', '=', 'users.id')
        ->get();

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
