@extends('layouts.admin')

@section('content')

<div class="container">
<div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-12">
            <div class="card-box">
                <div class="card-title">
                    <h3>Update  Video</h3>
                </div>
                <hr>
                <form role="form" action="/videos/{{$video->id}}" method="post">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                    <div class="form-group">
                        <label >Video Title</label>
                        <input type="text" name="title" value="{{$video->title}}" class="form-control" placeholder="video title">
                        @if ($errors->has('title'))
                            <div class="text-danger">*{{ $errors->first('title')}}</div>
                        @endif
                    </div>
                    
                    
                    <div class="form-group">
                        <label >Video Link</label>
                        <input type="text" class="form-control" id="videolink" value="{{$video->videolink}}" name="videolink" id="exampleInputPassword1" placeholder="youtube video code">
                        @if ($errors->has('videolink'))
                            <div class="text-danger">*{{ $errors->first('videolink')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id" >
                        
                        <option selected value="{{$video->category_id}}">{{$video->category->category_name}}</option>

                        @php($category = \App\Category::all())
                        @foreach($category as $key => $c)
                            @if($c->id != $video->category_id)
                            <option value="{{$c->id}}">{{$c->category_name}}</option>
                            @endif
                        @endforeach


                        <!--  -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Short Description</label>
                        <textarea class="form-control" name="description" rows="5">{{$video->description}}</textarea>
                    </div>
                    @if ($errors->has('description'))
                            <div class="text-danger">*{{ $errors->first('description')}}</div>
                    @endif

                    <div class="form-group">
                        <div class="checkbox">
                            <input id="remember-1" type="checkbox" name="featured[]" value='1' @if($video->featured) checked  @endif >
                            <label for="remember-1"> Featured  </label>
                        </div>
                        <small>*Featured video will show in video slider</small>
                    </div>

                    <button type="submit" class="btn btn-primary" onClick="youtubeURL()">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>



</script>

@endsection