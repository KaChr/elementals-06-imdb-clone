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
        
        //If the user doesn't already have the item saved in watchlist: add it. 
        if ($watchlist == null) {
            $watchlist = Watchlist::create([
                'user_id' => Auth::user()->id,
                'item_id' => $request->input('id')
            ]);
            $watchlist->save();
            return back();
        }

        // else {
        //     //ERROR MESSAGE: ALREADY EXISTS IN WATCHLIST
        // }

    //}
        
    }

    public function destroy(Request $request)

    {

        $watchlist = Watchlist::where('user_id', '=', Auth::user()->id)
        ->where('item_id', '=', $request->input('id'))->first();

        $watchlist->delete();
        return back();
    }
        
    //     //Create a new watchlist using the request data

    //     // Save it to the database

    //     //And redirect...
    // }


}


