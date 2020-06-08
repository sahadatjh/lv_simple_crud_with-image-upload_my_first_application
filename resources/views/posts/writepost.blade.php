@extends('welcome')
@section('content')

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        	<a href="{{ route('add.catagory') }}" class="btn btn-success">Add Catagory</a>
        	<a href="{{ route('all.catagory') }}" class="btn btn-info">All Catagory</a>
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
        
        <form action="{{ route('store.post') }}" method="post"  enctype="multipart/form-data">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" name="title"  class="form-control" placeholder="Title" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="form-group floating-label-form-group controls">
              <label>Catagory Id</label>
              <select class="form-control" name="catagory">
                @foreach($catagory as $row)
              	<option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
              </select>
              <p class="help-block text-danger"></p>
            </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
             <textarea rows="5" name="details" class="form-control" placeholder="Details" ></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Photo</label>
              <input type="file" name="image" class="form-control"  >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Save Post</button>
          </div>
        </form>
      </div>
    </div>
  
@endsection()