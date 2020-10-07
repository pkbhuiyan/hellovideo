<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Like;
use App\Category;
use App\PlayList;
use App\PlaylistItem;

class ClientSideController extends Controller
{
    // homepage feature video
    public function get_all_featured_videos(){
        $video = Video::where('featured',1)->get();
        return $video;
    }

    public function get_category(){
        $category = Category::orderBy('id','DESC')->get();
        foreach ($category as $key => $value) {
            // check if category have any video
            if(sizeof(Category::find($value->id)->video) != 0){
                $val[] = $value;     
            }
        }
        return $val;
    }

    public function get_videos(){
        $get_video = Video::all();
        return $get_video;
    }

    public function get_playlist(){
        $playlist = PlayList::all();
        foreach($playlist as $pl){
            $get_playlist[] = \DB::table('videos')
                    ->join('playlist_items', 'videos.id', '=', 'playlist_items.video_id')
                    ->join('play_lists', 'playlist_items.play_list_id', '=', 'play_lists.id')
                    ->where('playlist_items.play_list_id','=',$pl->id)
                    ->select('videos.videolink','videos.id','play_lists.title')
                    ->get()
                    ->first();
           
        }

        return response()->json($get_playlist);
    }

    public function get_all_playlist_video($id){
        // IS IN PLAYLIST?
        $inPlaylistItem = \DB::table('playlist_items')
                            ->where('playlist_items.video_id','=',$id)
                            ->select('playlist_items.*')
                            ->get();
        
        if($inPlaylistItem){
            // IF IT IS THEN GET PLAYLIST ITEMS
            foreach($inPlaylistItem as $inpl){
                $getPlayListId = $inpl->play_list_id;
            }
           $result = \DB::table('videos')
                    ->join('playlist_items', 'videos.id', '=', 'playlist_items.video_id') 
                    ->where('playlist_items.play_list_id','=',$getPlayListId)
                    ->select('videos.*', 'playlist_items.*')
                    ->get();
                    
            foreach ($result as $r) {
                $count = Like::where('video_id',$r->video_id)->count();
                $r->likes = $count;
            }
            return $result;
        }

    }
}

