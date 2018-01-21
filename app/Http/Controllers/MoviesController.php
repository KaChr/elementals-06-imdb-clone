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
   public function index(Request $request)
   {
       //
       //$movies = Movie::all();
        $movies = Movie::sortable()->paginate();
        $genres = Genre::all();     

        return view('categories', ['movies'=>$movies, 'genres'=>$genres]);
   }

   public function genreSelect(Request $request)
   {

    $id = $request->genre;
        
       if ($request->input('genre')) {
            $genres = Genre::all();  

            // hämta
            $items = Item::whereHas('genres', function($query) use ($id) {
                $query->where('genre_id', '=', $id );
            })->get();
            
            $movies = [];

            foreach($items as $item){
                array_push($movies, Movie::find($item->id));
            }

            return view('categories', ['movies'=> $movies, 'items'=> $items, 'genres'=> $genres]);
       }

       // redirect to @index
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
        $item = Item::find($id);
        $reviews = Review::orderBy('created_at', 'desc')->where('item_id', $id)->limit(4)->get();
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
