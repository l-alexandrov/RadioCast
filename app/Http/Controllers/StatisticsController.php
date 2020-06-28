<?php

namespace App\Http\Controllers;

use App\Programme;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function home(Request $request)
    {
        return view('stats');
    }

    public function stats(Request $request)
    {
        DB::connection()->enableQueryLog();
        $begin = date('Y-m-d', strtotime($request->post('start_date')));
        $end = date('Y-m-d', strtotime($request->post('end_date')));
        $most_broadcasted_performer = Programme::with(['song', 'song.artist'])
            ->leftJoin('songs', 'programme.song_id', '=', 'songs.id')
            ->whereRaw("DATE(created_at) BETWEEN '$begin' AND '$end'")
            ->groupBy('songs.artist_id')->orderByRaw('COUNT(*) DESC')->first()
            ->song->artist;
        $most_broadcasted_song = Programme::with(['song'])
            ->whereRaw("DATE(created_at) BETWEEN '$begin' AND '$end'")
            ->groupBy('song_id')->orderByRaw('COUNT(*) DESC')->first()
            ->song;
        $songs = Programme::with(['song'])
            ->leftJoin('songs', 'programme.song_id', '=', 'songs.id')
            ->whereRaw("DATE(created_at) BETWEEN '$begin' AND '$end'")
            ->groupBy('song_id')->orderByRaw("MAX(songs.length) DESC")->get();
        $longest_song = $songs->first()->song;
        $shortest_song = $songs->last()->song;
        $most_broadcasted_style = Programme::with(['song', 'song.genre'])
            ->leftJoin('songs', 'programme.song_id', '=', 'songs.id')
            ->whereRaw("DATE(created_at) BETWEEN '$begin' AND '$end'")
            ->groupBy('songs.genre_id')->orderByRaw('COUNT(*) DESC')->first()
            ->song->genre;
        $style_with_most_songs = Song::with('genre')->groupBy('genre_id')->orderByRaw('COUNT(*) DESC')->first()->genre;
        $data = [
            'most_broadcasted_performer' => $most_broadcasted_performer->name,
            'most_broadcasted_song' => $most_broadcasted_song->name,
            'longest_song' => $longest_song->name,
            'shortest_song' => $shortest_song->name,
            'most_broadcasted_style' => $most_broadcasted_style->name,
            'style_with_most_songs' => $style_with_most_songs->name
        ];

        return view('stats', $data);
    }
}
