@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-title">
                    Playlists
                    
                    
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i>New Playlist</button>
                </div>
                <hr>
                <div class="">
                        <input type="text" class="search-box" placeholder="search">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                </div>
            <!-- modal form -->
                @include('components.newplaylist')
            <!-- end -->
            <div class="col-md-12">

            
            @foreach($playList as $key => $l)
            <div class="col-md-3">
                <div class="card">
                @php(
                    $result = \DB::table('videos')
                    ->join('playlist_items', 'videos.id', '=', 'playlist_items.video_id') 
                    ->where('playlist_items.play_list_id','=',$l->id)
                    ->select('videos.videolink')
                    ->get()
                    ->first()
                )
<!-- get the first thumbnail of playlist video if exists -->

            @if(empty($result->videolink))
                <img class="card-img-top img-cover" src="image/{{$l->image}}" alt="Card image cap">
            @else
                <img class="card-img-top img-cover" class="img-cover" src=" https://img.youtube.com/vi/{{$result->videolink}}/hqdefault.jpg" alt="Card image cap">
            @endif
                        
                    
<!-- else show default -->
                    <div class="card-body">
                        <h5 class="card-title">{{$l->title}}</h5>
                        <div class="action-button">
                            <span>
                                <!-- <a href="/play_lists/{{$l->id}}" class="btn btn-primary">view</a> -->
                                <a href="/play_lists/{{$l->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                            </span>
                            <span>
                            <form action="{{route('play_lists.destroy',$l->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href=""><button type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </a>         
                            </form>
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
            </div>    
        </div>
        </div>
    </div>
</div>

@endsection