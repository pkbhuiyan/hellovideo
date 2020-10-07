<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    


    public function profile(){
        $response = auth()->user();
        // return response()->json($response);
        return $response;
    }
}
