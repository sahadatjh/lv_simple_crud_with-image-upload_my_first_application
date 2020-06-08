@extends('welcome')
@section('content')

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
            <a href="{{ route('all.post') }}" class="btn btn-dark">All Posts</a>
        </p>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <hr>
        @endif
        
        <form action="{{ url('update/post/'.$post->id) }}" method="post"  enctype="multipart/form-data">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" name="title"  class="form-control" value="{{ $post->title }}">
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="form-group floating-label-form-group controls">
              <label>Catagory Id</label>
              <select class="form-control" name="catagory">
                @foreach($catagory as $row)
              	<option value="{{ $row->id }}" <?php if($row->id==$post->catagori_id) echo "selected"?> >{{ $row->name }}</option>
                @endforeach
              </select>
              <p class="help-block text-danger"></p>
            </div>
          <div class="control-group">
            <div class="form-group col-xs-12 ">
            <label>New Image</label>
             <input type="file" class="form-control"   name="image"><br>
  				Old Image: <img src="{{ URL::to($post->image) }}" style="height: 40px; width: 80px; " >
  				<input type="hidden" name="oldphoto" value="{{ $post->image }}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
             <textarea rows="5" name="details" class="form-control" placeholder="Details" >
                {{ $post->detail}}
             </textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Post</button>
          </div>
        </form>
      </div>
    </div>
  
@endsection()