<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;

class TickerController extends Controller
{
    public function ticker(Request $request)
    {
        $song = Programme::with('song')->get()->last()->song;

        return view('ticker', ['song' => $song]);
    }
}
