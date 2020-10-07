<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    protected $fillable = [
        'title'
    ];

    public function playlistitem(){
        return $this->hasMany('App\PlaylistItem');
    }

}
