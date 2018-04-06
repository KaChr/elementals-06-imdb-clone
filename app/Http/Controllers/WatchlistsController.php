<?php

namespace App\Http\Controllers;

use App\Watchlist;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WatchlistsController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth', ['except' => ['show']]);
    }


    public function show(Watchlist $watchlist)

    {
        $watchlists = Watchlist::with('movies', 'tvshows')
        ->where('user_id', Auth::user()->id)
        ->join('items', 'items.id', '=', 'item_id')
        ->get();

        return view ('watchlists.show', ['watchlists' => $watchlists]);

    }

    public function store(Request $request)

    {

        $watchlist = Watchlist::where('user_id', '=', Auth::user()->id)
        ->where('item_id', '=', $request->input('id'))->first();
        
        if ($watchlist == null) {
            $watchlist = Watchlist::create([
                'user_id' => Auth::user()->id,
                'item_id' => $request->input('id')
            ]);
            $watchlist->save();
            return back();
        } else {
            $watchlist->delete();
            return back();
        }

    }

    public function destroy(Request $request)

    {

        $watchlist = Watchlist::where('user_id', '=', Auth::user()->id)
        ->where('item_id', '=', $request->input('id'))->first();

        $watchlist->delete();
        return back();
    }

}


