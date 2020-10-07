<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Video;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $bookmark = Bookmark::create([
            'video_id' => $request['Video'],
            'user_id' => auth()->user()->id
        ]);

        return $bookmark;
    }

    public function show($id)
    {
        $user_id = auth()->user()->id;
        $isMarked = Bookmark::where('bookmarks.video_id','=',$id,'and','bookmarks.user_id','=',$user_id)->get();
        return $isMarked;
    }

    public function edit(Bookmark $bookmark)
    {
        //
    }

    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }

    public function get_bookmarked_video(){
        $user_id = auth()->user()->id;
        $video_id = Bookmark::where('user_id',$user_id)->get();
        foreach ($video_id as $key => $value) {
            $videos[] = Video::find($value->video_id);
        }
        return $videos;
    }


    public function destroy($id)
    {
        $user_id = auth()->user()->id;
        $delete = \DB::table('bookmarks')
                    ->where('bookmarks.video_id','=',$id,'and','bookmarks.user_id','=',$user_id)
                    ->delete();
        
        return $delete;
    }
}
