<?php

namespace App\Http\Controllers;

use App\Season;
use App\Tvshow;
use App\Item;
use App\Episode;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();
        
        return view('seasons.index', ['seasons'=>$seasons]);
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
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show($item_id, $season_nr)
    {
        $tvshow = Tvshow::find($item_id);
        $season = Season::where('tvshow_id', '=', $item_id)->where('season_nr', '=', $season_nr)->first();
        $episodes = Episode::where('season_id', '=', $season->item_id)->get();
        $season_item = Item::find($season->item_id);

        return view('tvshows/seasons.show', ['season'=>$season, 'tvshow'=>$tvshow, 'episodes'=>$episodes, 'season_item'=>$season_item]);
    }

    /* Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }
}
