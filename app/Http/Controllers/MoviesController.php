<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Item;
use App\Review;
use Illuminate\Http\Request;

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
       $movies = Movie::latest('rating')->get();
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
       //
       //$movie = Movie::where('id', $movie->id)->first();
       $id = $movie->item_id;
       $movie = Movie::find($id);
       $item = Item::find($id);

       //$reviews = Review::where('item_id','=',$id)->get();
       return view('movies.show', ['movie'=>$movie, 'item'=>$item]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Movie  $movie
    * @return \Illuminate\Http\Response
    */
   public function edit(Movie $movie)
   {
       //
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
