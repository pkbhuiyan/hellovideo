<?php



Route::get('/', function () {
    return view('home');
});

Auth::routes();


// all user route
Route::get('/home', 'HomeController@index')->name('home');


//  admin route
Route::get('/admin', function () {
    return view('layouts.admin');
});



//  vue hashbang is checked ;)

// Route::get('/{vue_capture?}', function () { 
    
//     if(Auth::User()->role == 'admin'){
//         return view('layouts.admin');
//     }else{
//         return view('home');
//     }

// })->where('vue_capture', '[\/\w\.-]*');



// Route::get('{path}', 'HomeController@index')->name('path','([A-z\d-\/_.]+)?');

// Route::get('/{vue_capture?}', function() { return view('home'); })->where('any', '(.*)');


// DASHBOARD
Route::get('dashboard',function(){
    return View::make('pages.dashboard');
});


// USER
Route::get('/profile','UserController@profile');

// SEARCH
Route::get('/search','SearchController@search');

// VIDEO
Route::get('/get_video_by_id/{get_video_by_id}','VideoController@get_video_by_id');
Route::get('/videoupload','VideoUpController@index')->name('videoupload.index');





// RESOURCE ROUTER
Route::resources([
    'videos' => 'VideoController',
    'categories'=>'CategoryController',
    'play_lists' => 'PlayListController',
    'likes' => 'LikeController',
    'bookmarks' => 'BookmarkController'
]);


// Route::prefix('dhkcontent')->group(function(){
    // BOOKMARK
    Route::get('/get_bookmarked_vid','BookmarkController@get_bookmarked_video');
    // HOME
    Route::get('/get_all_feature_video','ClientSideController@get_all_featured_videos');
    Route::get('/get_category','ClientSideController@get_category');
    Route::get('/get_videos','ClientSideController@get_videos');
    Route::get('/get_playlist','ClientSideController@get_playlist');
    Route::get('/get_all_playlist_video/{get_all_playlist_video}','ClientSideController@get_all_playlist_video');
    // PLAYLIST
    Route::post('/playlist_item/{playlist_item}','PlaylistItemController@add_from_collection');
    Route::get('/play_list/{play_list}','PlayListController@get_all_video');
    Route::post('/play_list/{play_list}','VideoController@video_with_playlist');
// });

