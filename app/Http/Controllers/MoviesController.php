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
        
        return view('movies.index', ['movies'=>$movies]);
    }

    public function genreSelect(Request $request)
    {
        $genreId = $request->input('genre') ? $request->input('genre') : 1;

        $genres = Genre::all();

        $items = Item::whereHas('genres', function ($query) use ($genreId) {
            $query->where('genre_id', '=', $genreId);
        })->get();
        
        $movies = [];

        foreach ($items as $item) {
            array_push($movies, Movie::find($item->id));
        }

        return view('categories', ['movies'=> $movies, 'genres'=> $genres]);
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
