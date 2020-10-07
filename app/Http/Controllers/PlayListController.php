<?php

namespace App\Http\Controllers;

use App\PlayList; 
use App\Video;  
use Validator;
use Illuminate\Http\Request;

class PlayListController extends Controller
{
  
    public function index()
    {
        $playList = PlayList::all();
        
        
        return view('pages.playlist',compact('playList'));
    }

 
    


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
        $status =Validator::make($request->all(), [
            'title' => 'required|string|max:191',
        ]); 

        if ($status->fails()) {
            toastr()->error("Error Occured");
            return redirect('/play_lists')->withErrors($status);
        }
        
       
        $data = PlayList::create([
            'title' => $request['title']
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect('/play_lists');
        
    }


  
    public function show($id)
    {
        $playlist = PlayList::findOrFail($id);

        
        
        $result = \DB::table('videos')
            ->join('playlist_items', 'videos.id', '=', 'playlist_items.video_id') 
            ->where('playlist_items.play_list_id','=',$id)
            ->select('videos.*', 'playlist_items.*')
            ->get();

        $lists = Video::all();

        return view('pages.addplaylistvideo',compact('lists','playlist','result'));
    }




  
    public function edit(PlayList $playList)
    {
        //
    }

    public function update(Request $request, PlayList $playList)
    {
        //
    }

    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $playlist = PlayList::findOrFail($id);
        $playlist->delete();
        toastr()->warning('Deleted !!');
        return back();

        
    }
}
