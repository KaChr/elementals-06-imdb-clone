<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemPageController extends Controller
{
    public function index()
    {
        return view('itemPage');
    }
}
