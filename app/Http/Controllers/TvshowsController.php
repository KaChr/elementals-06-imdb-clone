<?php

namespace App\Http\Controllers;

use App\Tvshow;
use App\Item;
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

        $item = Item::find($id);
        return view('tvshows.show', ['tvshow'=>$tvshow, 'item'=>$item]);
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
