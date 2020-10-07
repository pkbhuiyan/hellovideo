<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    
    protected $fillable = [
        'title','videolink', 'description', 'featured', 'category_id', 'user_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function like(){
        return $this->hasMany('App\Like');
    }
    public function bookmark(){
        return $this->hasMany('App\Bookmark');
    }

    public function image(){
        return $this->hasOne('App\Image');
    }

    
}
