<?php

namespace App\Http\Controllers;

use App\Like;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        //
    }

    

  
    public function store(Request $request)
    {
        // $like = $request->all();
        // return response()->json($like);
        // $user_id = auth()->user()->id;
        $like = Like::create([
            'video_id' => $request['Video'],
            'user_id' => auth()->user()->id
        ]);

        return $like;
        
    }


    public function show($id)
    {
        $user_id = auth()->user()->id;
        $isLiked = Like::where('likes.video_id','=',$id,'and','likes.user_id','=',$user_id)->get();
        return $isLiked;
    }

 

    public function edit(Like $like)
    {
        //
    }

    public function update(Request $request, Like $like)
    {
        //
    }

 
    public function destroy($id)
    {
        $user_id = auth()->user()->id;
        $delete = \DB::table('likes')
                    ->where('likes.video_id','=',$id,'and','likes.user_id','=',$user_id)
                    ->delete();
        
        return $delete;
                    
    }
}
