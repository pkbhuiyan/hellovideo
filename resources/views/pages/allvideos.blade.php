@extends('layouts.admin')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
                <div class="card-title">
                    Video Library
                    <div class="pull-right ">
                        <input type="text" class="search-box" placeholder="search">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                    </div>
                </div>
                    
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Thumb</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Uploaded By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($video as $key => $v)
                        <tr>
                            <th>{{$key+1}}</th>

                            <!-- 

                IF WE HAVE CUSTOM IMAGE THEN SHOW CUSTOM OR GET THE IMAGE FROM YOUTUBE

                             -->
                            @if($v->image['video_id'] == $v->id)
                                <!-- image -->
                                <td><img height="40" width="70" class="img-cover" src="thumbnail/{{$v->image['image']}}" alt=""></td>
                                <!-- end image -->
                            @else
                                 <!-- image -->
                                 <td><img height="40" width="70" class="img-cover" src="https://img.youtube.com/vi/{{$v->videolink}}/hqdefault.jpg" alt=""></td>
                                <!-- end image -->
                            @endif

                            <!-- END -->
                            
                            <td>{{$v->title}}</td>
                            <td>
                            <span class="badge badge-success badge-pill pull-left">{{$v->category->category_name}} <i class="mdi mdi-trending-up"></i> </span>
                            </td>
                            <td>{{$v->user->name}}</td> 
                            <td class="action-btn">
                                <a href="videos/{{$v->id}}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                    
                                </a>  
                            
                            
                            <form action="{{route('videos.destroy',[$v->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                
                                    <button type="submit" class="btn btn-warning" style="width:97%;">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>  
                                
                            </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="center">
                
                    {{ $video->links() }}
                
                </div>
                
                </div>
            </div>
        </div>
</div>

@endsection