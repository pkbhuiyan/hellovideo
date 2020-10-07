<?php

namespace App\Http\Controllers;

use App\Video;
use App\PlaylistItem;
use App\Image as Images;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
{

    // VIDEO LIBRARY
    public function index()
    {
        $video = Video::paginate(5);
        return view('pages.allvideos',compact('video'));
    }

    // GET VIDEO BY ID * VIDEO PAGE *
    public function get_video_by_id($id){
        $video = Video::findOrFail($id);
        return $video;
    }
    


    public function create()
    {
        // 
    }



    public function store(Request $request)
    {
        // $val = $request->all();
        // dd($val);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'description' => 'required|min:3|max:2000',
            'videolink' => 'required|string',
            'category_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('/videoupload')->withErrors($validator);
        }

        //  FEATURED IMAGE HANDLER


        
        $link = $request['videolink'];
        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
        // $link = $my_array_of_vars['v'];
        if($request['featured'] != null){
            foreach ($request['featured'] as $key => $value) {
               
                $video = Video::create([
                    'title' => $request['title'],
                    'category_id' => $request['category_id'],
                    'user_id' => auth()->user()->id,
                    'videolink' => $request['videolink'],
                    'description' => $request['description'],
                    'featured' =>  $value
                ]);     

                
            }
        }else{
            $video = Video::create([
                'title' => $request['title'],
                'category_id' => $request['category_id'],
                'user_id' => auth()->user()->id,
                'videolink' => $request['videolink'],
                'description' => $request['description'],
            ]);

            
        }

        /*

        IF WE HAVE CUSTOM IMAGE
        + IMAGE RESIZE (ORIGNAL + THUMBNAIL)

        */

        if($request->hasFile('image')){
            // image resize
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            // thumbnail size image path
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->getRealPath()); //real image file location
            // resized and save in thumbnail
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
            
            $destinationPath = public_path('/image');
            $image->move($destinationPath, $input['imagename']);


            $image = Images::create([
                'video_id' => $video->id,
                'image' => $input['imagename'] 
            ]);
       }

    //    END 
  
        toastr()->success('New Video Created !!');
        return redirect('/videoupload');
        return $request;

    }
    

    // UPLOAD VIDEO FROM PLAYLIST CREATION PAGE (CREATE VDIEO IN PLAYLIST)


    public function video_with_playlist(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'description' => 'required|min:3|max:2000',
            'videolink' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        
        $video = Video::create([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'user_id' => auth()->user()->id,
            'videolink' => $request['videolink'],
            'description' => $request['description']
        ]);

        $playlist = PlaylistItem::create([
            'video_id' => $video->id,
            'play_list_id' => $id
        ]);

        toastr()->success('New Video added to playlist !!');
        return back();
    }

   
//  SHOW VIDEO IN UPDATE PAGE

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('pages.updatevideo',compact('video'));
    }


    public function edit($id)
    {
        
    }


    // UPDATE VIDEO

    public function update(Request $request, $id)
    {
        $video = Video::where('id','=',$id)->first();
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:191',
            'description' => 'required|min:3|max:2000',
            'videolink' => 'required|string',
            'category_id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return redirect('/videoupload')->withErrors($validator);
        }
        toastr()->success('Video Updated!!');
        // dd($request->all());
        if($request['featured'] != null){
            foreach($request['featured'] as $key => $value){
           
                $video->update([
                    'title' => $request['title'],
                    'category_id' => $request['category_id'],
                    'user_id' => auth()->user()->id,
                    'videolink' => $request['videolink'],
                    'description' => $request['description'],
                    'featured' =>  $value
                ]);
                
            }
        }else {
            $video->update([
                'title' => $request['title'],
                'category_id' => $request['category_id'],
                'user_id' => auth()->user()->id,
                'videolink' => $request['videolink'],
                'description' => $request['description'],
                'featured' => 0
            ]);
        }
        return back();
    }

//  DELETE VIDEO
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $category = Video::findOrFail($id);
        $category->delete();
        toastr()->warning('Deleted !!');
        return back();
    }
}
