<div class="container">
    <div class="row">
             @foreach($result as $obj)
            <div class="col-md-12 block">    
                <div class="col-md-2 col-sm-2">
                    <img width="130" height="80" class="img-cover" src="https://img.youtube.com/vi/{{$obj->videolink}}/hqdefault.jpg" alt="">
                </div>
                
                <div class="col-md-10 col-sm-10">
                    <h4>{{ str_limit($obj->title,$limit = 60, $end = '....')}}</h4>
                    <p>{{str_limit($obj->description,$limit = 100, $end = '....')}}</p>
                </div>
            </div>
            @endforeach      
    </div>
</div>