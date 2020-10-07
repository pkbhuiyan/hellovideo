@extends('layouts.admin')

@section('content')

<div class="container">
<div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-title">
                    <h3>Upload Video</h3>
                </div>
                <hr>
                <form role="form" action="{{ action('VideoController@store') }}" method="post" enctype='multipart/form-data'>

                {{ csrf_field() }}
                    <div class="form-group">
                        <label >Video Title</label>
                        <input type="text" name="title"  class="form-control" placeholder="video title">
                        @if ($errors->has('title'))
                            <div class="text-danger">*{{ $errors->first('title')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id">
                        <option>Select</option>


                        @foreach($category as $key => $v)
                            <option value="{{$v->id}}">{{$v->category_name}}</option>
                        @endforeach

                        
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="text-danger">*Please Choose a Category</div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label >Video Link</label>
                        <input type="text" class="form-control" id="videolink" name="videolink" id="exampleInputPassword1" placeholder="youtube video code">
                        @if ($errors->has('videolink'))
                            <div class="text-danger">*{{ $errors->first('videolink')}}</div>
                        @endif
                    </div>
                    <!-- image input -->
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image Input</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    
                    <div class="form-group">
                        <label >Short Description</label>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>
                    @if ($errors->has('description'))
                            <div class="text-danger">*{{ $errors->first('description')}}</div>
                    @endif

                    <div class="form-group">
                        <div class="checkbox">
                            <input id="remember-1" type="checkbox" name="featured[]" value='1'>
                            <label for="remember-1"> Featured  </label>
                        </div>
                        <small>*Featured video will show in video slider</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>




// function youtubeURL(){

    

//     var url = document.getElementById('videolink').value;
//     $( "input[type='text']" ).change(function() {
        
//     });
//     youtube_video_link_checker(url){
//                 var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
//                 var match = url.match(regExp);
//                 if (match && match[2].length == 11) {
//                     url.value =  match[2];
//                 } else {
//                     alert('Invalid Video Link!!');
//                 }
//             }

//     }

</script>

@endsection