<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

        <form action="{{ action('PlayListController@store') }}" method="POST">
        {{ csrf_field() }}
              <div class="form-group">
                  <label for="exampleFormControlInput1">Playlist Name</label>
                  <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="playlist name">
                  @if ($errors->has('title'))
                            <div class="text-danger">*{{ $errors->first('title')}}</div>
                  @endif
              </div>
        


              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
    
        </form>


      </div>
    </div>
  </div>
</div>