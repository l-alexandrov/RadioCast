<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Song extends Model
{
    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'genre_id', 'artist_id', 'length', 'album'
    ];

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
