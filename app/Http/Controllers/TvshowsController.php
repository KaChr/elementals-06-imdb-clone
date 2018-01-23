<?php

namespace App\Http\Controllers;

use App\Tvshow;
use App\Item;
use App\Season;
use App\Review;
use Illuminate\Http\Request;

class TvshowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvshows = Tvshow::all();
        
        return view('tvshows.index', ['tvshows'=>$tvshows]);
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
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function show(Tvshow $tvshow)
    {
        $id = $tvshow->item_id;
        $tvshow = Tvshow::find($id);
        $seasons = Season::where('tvshow_id', '=', $id)->get();

        $reviews = Review::orderBy('reviews.created_at', 'desc')
            ->where('reviews.item_id', $id)
            ->join('users', 'author_id', '=', 'users.id')
            ->join('tvshows', 'reviews.item_id', '=', 'tvshows.item_id')
            ->limit(2)->get(['reviews.*', 'users.name', 'tvshows.poster', 'reviews.rating AS review_rating']);
        
        $item = Item::find($id)
                ->leftJoin('actor_character_item', 'id', '=', 'actor_character_item.item_id')
                ->leftJoin('characters as character', 'character.id', '=', 'actor_character_item.character_id')
                ->leftJoin('people as actor', 'actor.id', '=', 'actor_character_item.person_id')
                ->where('item_id', $id)
                ->get();

        // dd($item);
        return view('tvshows.show', ['tvshow' => $tvshow, 'item' => $item, 'seasons' => $seasons, 'reviews' => $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function edit(Tvshow $tvshow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tvshow $tvshow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tvshow $tvshow)
    {
        //
    }
}
