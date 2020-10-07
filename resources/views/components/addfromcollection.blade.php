<div class="container">
    <div class="row">
            <form role="form" action="{{ action('PlaylistItemController@add_from_collection',$playlist->id) }}" method="post">

            {{ csrf_field() }}
                <div class="scroll-prop">
                    @foreach($lists as $v)
                    <div class="col-md-12 block">
                        <div class="col-xs-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="checks" name="selectVid[]" class="form-check-input" value="{{$v->id}}">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <img width="130" height="80" class="img-cover" src="https://img.youtube.com/vi/{{$v->videolink}}/hqdefault.jpg" alt="image">
                        </div>
                        <div class="col-md-9 col-sm-10">
                            <h4>{{ str_limit($v->title,$limit = 60, $end = '....')}}</h4>
                            <p>{{ str_limit($v->description,$limit = 100, $end = '....')}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="footer-button">
                    <input type="submit" class="btn btn-primary" id="submit" value="Add Video" disabled>
                </div>

            </form>
        <!-- <div class="center">
                
            {{ $lists }}
                
        </div> -->
    </div>
</div>

<script>

</script>