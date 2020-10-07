<?php

namespace App\Http\Controllers;

use App\PlayList;
use App\PlaylistItem;
use Illuminate\Http\Request;

class PlaylistItemController extends Controller
{
    public function add_from_collection(Request $request,$id){
        // playlist id
        // echo $id;
        
        // video id
        $val = $request['selectVid'];
        foreach($val as $v){
            PlaylistItem::create([
                'play_list_id' => $id,
                'video_id' => $v
            ]);
        }

        toastr()->success('Added to playlist !!');
        return back();

        
    }
}
