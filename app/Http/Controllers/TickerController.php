<?php

namespace App\Http\Controllers;

use App\Programme;
use App\Song;
use Illuminate\Http\Request;

class TickerController extends Controller
{
    public function ticker(Request $request)
    {
        $song = Programme::all()->last()->song;
        dd($song->name);
    }
}
