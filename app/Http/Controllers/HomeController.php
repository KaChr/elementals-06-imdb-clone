<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $latest = Movie::orderBy('rating', 'desc')->first();
        $item = Item::find($latest->item_id);
        // $movie = Movie::find()->latest()->first();
        
        return view('home', ['featured' => $latest, 'item' => $item]);
    }
}
