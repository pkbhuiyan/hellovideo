<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistItem extends Model
{
    protected $fillable = [
        'video_id','play_list_id'
    ];
    public function playlist(){
        return $this->belongsTo('App\PlayList');
    }

   

   
    

    
}
