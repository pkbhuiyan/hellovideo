<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request){
        $text = $request->input('text');
        if($request->ajax()){
            $result = Category::where('category_name','like',$text.'%')->get();
            return response()->json($result);
        }
        
    }
}
