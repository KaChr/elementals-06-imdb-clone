<?php

namespace App\Http\Controllers;

use App\Watchlist;

use Illuminate\Http\Request;

class WatchlistsController extends Controller
{
    /*
    public function index()

    {
        //
        return view ('watchlist.index');
    }
    */

    public function show(Watchlist $watchlist)

    {
        //
        return view ('watchlists.show', compact('watchlist'));
    }
}
