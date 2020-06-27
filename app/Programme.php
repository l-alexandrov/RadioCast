<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Programme extends Model
{
    use Notifiable;

    protected $table = "programme";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'song_id'
    ];

    public function song()
    {
        return $this->belongsTo('App\Song');
    }
}
