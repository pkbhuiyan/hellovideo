<form role="form" action="{{ action('VideoController@video_with_playlist',$playlist->id) }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label >Video Title</label>
                        <input type="text" name="title"  class="form-control" placeholder="video title">
                        
                            <div class="text-danger"></div>
                        
                    </div>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id">
                        <option>Select</option>
                        
                            @php($category = \App\Category::all())
                            @foreach($category as $key => $c)
                                
                                <option value="{{$c->id}}">{{$c->category_name}}</option>
                                
                            @endforeach
                      
                        </select>
                        
                            <div class="text-danger"></div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label >Video Link</label>
                        <input type="text" class="form-control" id="videolink" name="videolink" id="exampleInputPassword1" placeholder="youtube video code">
                        
                            <div class="text-danger"></div>
                        
                    </div>

                    <div class="form-group">
                        <label >Short Description</label>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>
                   
                            <div class="text-danger"></div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>