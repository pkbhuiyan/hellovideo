<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'video_id','image'
    ];
    public function video(){
        return $this->belongsTo('App\Video');
    }
}
