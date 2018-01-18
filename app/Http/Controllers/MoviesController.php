<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Item;
use App\Review;
use Illuminate\Http\Request;
use App\Genre;

class MoviesController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       //
       //$movies = Movie::all();
       $movies = Movie::sortable()->paginate(100);
       return view('movies.index', ['movies'=>$movies]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       //
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $id = $movie->item_id;
        $movie = Movie::find($id);
        $reviews = Review::orderBy('reviews.created_at', 'desc')
            ->where('reviews.item_id', $id)
            ->join('users', 'author_id', '=', 'users.id')
            ->join('movies', 'reviews.item_id', '=', 'movies.item_id')
            ->limit(2)->get(['reviews.*', 'users.name', 'movies.poster', 'reviews.rating AS review_rating']);
        
        $item = Item::find($id)
                ->leftJoin('actor_character_item', 'id', '=', 'actor_character_item.item_id')
                ->leftJoin('characters as character', 'character.id', '=', 'actor_character_item.character_id')
                ->leftJoin('people as actor', 'actor.id', '=', 'actor_character_item.person_id')
                ->where('item_id', $id)
                ->get();
        
        return view('movies.show', ['movie'=>$movie, 'item'=>$item, 'reviews'=>$reviews]);
    }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Movie  $movie
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Movie $movie)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Movie  $movie
    * @return \Illuminate\Http\Response
    */
   public function destroy(Movie $movie)
   {
       //
   }
}
