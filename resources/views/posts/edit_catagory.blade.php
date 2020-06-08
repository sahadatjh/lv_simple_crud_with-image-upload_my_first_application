@extends('welcome')
@section('content')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        
        <form action="{{ url('update/catagory/'.$catagory->id) }}" method="post">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Catagory Name</label>
              <input type="text" name="name" class="form-control" value="{{$catagory->name}}">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug</label>
              <input type="text" name="slug" class="form-control" value="{{$catagory->slug}}" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Update</button>
          </div>
        </form>
      </div>
    </div>
@endsection()