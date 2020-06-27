<?php

namespace App\Console\Commands;

use App\Artist;
use App\Events\SongChanged;
use App\Genre;
use App\Programme;
use App\Song;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Psr7\str;

class CheckForNewSong extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:newsong';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check whether song is changed listner';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $last_song_title = Programme::all()->last()->song->name;

        //TODO: here we should make a call to the radio API
        $raw_xml = Storage::get('public/radio.xml');
        $xml = new \SimpleXMLElement($raw_xml);
        $title = explode("-", $xml->title);
        $current_song_title = $title[1];

        sscanf($xml->next, "%d:%d:%d", $hours, $minutes, $seconds);
        $next = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
        if ($current_song_title !== $last_song_title) {
            $genre = Genre::updateOrCreate(['name' => $xml->genre]);
            $artist = Artist::updateOrCreate(['name' => $title[0]]);

            sscanf($xml->duration, "%d:%d:%d", $hours, $minutes, $seconds);
            $duration = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
            $song = Song::updateOrCreate([
                'artist_id' => $artist->id,
                'genre_id' => $genre->id,
                'album' => $xml->album,
                'length' => $duration,
                'name' => $current_song_title
            ]);

            $programme = new Programme();
            $programme->song_id = $song->id;

            $programme->save();
            event(new SongChanged($song));
        }
        sleep($next);
        $this->handle();
    }
}
