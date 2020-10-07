@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="col-xl-12">
            <div class="card-box">
                <!--  -->
                <div class="">
                    <h3 class="pull-left">Add Category</h3>
                </div>
                <!-- add category -->
                <div class="searchbar">
                    <div class="field-input">

                   


                    <form action="{{ action('CategoryController@store') }}" method="post">
                    {{ csrf_field() }}
                        <input type="text" name="category_name" placeholder="add category name">
                       
                        <button type="submit" class="btn btn-primary waves-effect w-md waves-light m-b-5">Add Category</button>
                    </form>
                    @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <small style="color:red;">{{ $error }}</small>*
                            @endforeach
                    @endif
                    </div>
                </div>
                <hr>
                <!-- end -->
                <!-- search -->
                <div class="searchbar col-xs-6">
                    <div>
                        <input type="text" class="search-box" placeholder="search">
                        <i class="fa fa-search search-icon"  aria-hidden="true"></i>
                    </div>
                </div>
                <!-- end search -->
                <!-- tags -->
                <div class="tag-class">
                    <ul class="tags">
                        <li>
                        
                        @foreach($value as $v)
                        <!-- category tags -->
                            <span class="tag">
                                <span data-toggle="modal" data-target="#categoryUpModal_{{$v->id}}">{{ $v['category_name'] }}</span> 
                                
                                    <!-- <span class="closeX" >X</span> -->
                            <form action="{{route('categories.destroy',[$v->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="closeX">X</button>               
                            </form>
                                
                            </span>

                        <!-- end tags -->


                            <!-- modal update category -->
                            <div class="modal fade" id="categoryUpModal_{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route('categories.update',$v->id)}}">
                                    @method('PATCH')
                                        @csrf


                                    <div class="modal-body field-input">
                                    <input type="text" class="form-control" name="category_name" value="{{$v->category_name}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                            <!-- end modal -->
                        @endforeach
                        <div id="searchResult"></div>
                        
                        </li>
                    </ul>
                </div>
                <!-- end tags -->
                <!-- Modal -->
                

                <!-- end -->
            
            </div>
        </div>
    </div>             

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script type="application/javascript">
$(document).ready(function(){

    $('#search').on('keyup', function(){

        var text = $('#search').val();

        $.ajax({

            type:"GET",
            url: '/search',
            data: {text: $('#search').val()},
            success: function(response) {

                console.log(response);
                $("#searchResult").html(response);

             }



        });


    });

});
</script> 
<script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>         
                
@endsection


