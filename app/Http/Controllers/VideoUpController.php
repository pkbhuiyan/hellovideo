<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;
use Illuminate\Http\Request;

class VideoUpController extends Controller
{
    // get all category for video upload
    public function index(){
        $category = Category::all();
        
        return view('pages.videoupload',compact('category'));
    }

    // public function update(){
    //     $category = Category::all();
    //     return view('pages.updatevideo',compact('category'));
    // }


    


}
