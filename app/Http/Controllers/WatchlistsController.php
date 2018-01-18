<?php

namespace App\Http\Controllers;

use App\Watchlist;

<<<<<<< HEAD
use App\User;

use Illuminate\Support\Facades\Auth;

=======
>>>>>>> Create migration, model and controller for watchlist
use Illuminate\Http\Request;

class WatchlistsController extends Controller
{
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

=======
>>>>>>> Create migration, model and controller for watchlist
    /*
    public function index()

    {
        //
        return view ('watchlist.index');
    }
    */

    public function show(Watchlist $watchlist)

    {
<<<<<<< HEAD

        $watchlists = Watchlist::with('movies')
        //->with('tvshows')
        ->where('user_id', Auth::user()->id)
        ->get();



        
        return view ('watchlists.show', compact('watchlists'));
    }

    public function store(Request $request)

    {

        //If a logged in user wants to add item to watchlist
        // if (\Auth::user()){

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

        else {
            //ERROR MESSAGE: ALREADY EXISTS IN WATCHLIST
        }

    //}
        
        //Create a new watchlist using the request data

        // Save it to the database

        //And redirect...
    }

    public function destroy(Request $request)

    {
        
        // $watchlists = Watchlist::with('movies')
        // //->with('tvshows')
        // ->where('user_id', Auth::user()->id)
        // ->get();

        $watchlist = Watchlist::where('user_id', '=', Auth::user()->id)
        ->where('item_id', '=', $request->input('id'))->first();

        $watchlist->delete();
        return back();
    }


}


=======
        //
        return view ('watchlists.show', compact('watchlist'));
    }
}
>>>>>>> Create migration, model and controller for watchlist
