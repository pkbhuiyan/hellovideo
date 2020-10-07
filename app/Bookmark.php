<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'video_id', 'user_id'
   ];
   public function user(){
       return $this->belongsTo('App\User');
   }
   public function video(){
       return $this->belongsTo('App\Video');
   }
}
