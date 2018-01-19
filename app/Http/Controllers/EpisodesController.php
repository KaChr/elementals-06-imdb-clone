<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Season;
use App\Item;
use App\Tvshow;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::all();
        
        return view('episodes.index', ['episodes'=>$episodes]);
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
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show($item_id, $season_nr, $episode_nr)
    {
        $tvshow = Tvshow::find($item_id);
        $season = Season::where('tvshow_id', '=', $item_id)->where('season_nr', '=', $season_nr)->first();
        $episode = Episode::where('season_id', '=', $season->item_id)->where('episode_nr', '=', $episode_nr)->first();
        $season_item = Item::find($season->item_id);

        return view('tvshows/seasons/episodes.show', ['tvshow'=>$tvshow, 'season'=>$season, 'episode'=>$episode, 'season_item'=>$season_item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        //
    }
}
