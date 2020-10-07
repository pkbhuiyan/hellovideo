@extends('layouts.admin') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h3>Add playlist video</h3>
                
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-playlist-tab" data-toggle="pill" href="#pills-playlist" role="tab" aria-controls="pills-playlist"
                            aria-selected="true">My Playlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-new-video-tab" data-toggle="pill" href="#pills-new-video" role="tab" aria-controls="pills-new-video"
                            aria-selected="false">Add New Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-from-website-tab" data-toggle="pill" href="#pills-from-website" role="tab" aria-controls="pills-from-website"
                            aria-selected="false">Add from Collection</a>
                    </li>
                    
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-playlist" role="tabpanel" aria-labelledby="pills-playlist-tab">
                    @include('components.myplaylist')

                    </div>
                    <div class="tab-pane fade" id="pills-new-video" role="tabpanel" aria-labelledby="pills-new-video-tab">
                        

                        @include('components.newplaylistvideo')
                    </div>
                    <div class="tab-pane fade" id="pills-from-website" role="tabpanel" aria-labelledby="pills-from-website-tab">
                        

                        @include('components.addfromcollection')
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection