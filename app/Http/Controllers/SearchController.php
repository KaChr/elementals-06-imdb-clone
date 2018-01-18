<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Person;
use App\TvShow; 

class SearchController extends Controller
{
    public function index()
    {
        $search = \Request::get('search');

        $movies = Movie::where('title', 'like', '%' . $search . '%')
            ->orderBy('rating')
            ->paginate(20);
        
        $people = Person::where('name', 'like', '%' . $search . '%')
            ->paginate(20); 

        $shows = TvShow::where('title', 'like', '%' . $search . '%')
            ->paginate(20);

        return view('search-results', [
            'query' => $search,
            'results' => [
                'movies' => $movies,
                'people' => $people,
                'shows' => $shows
            ]
        ]);
    }
}
