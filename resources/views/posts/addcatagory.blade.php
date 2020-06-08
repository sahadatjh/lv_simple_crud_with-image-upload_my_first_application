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
        <p>
        	
        	<a href="{{ route('all.catagory') }}" class="btn btn-success">All Catagory</a>
        </p>
        <form action="{{ route('store.catagory') }}" method="post">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Catagory Name</label>
              <input type="text" name="name" class="form-control" placeholder="Catagory Name">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug</label>
              <input type="text" name="slug" class="form-control" placeholder="Slug Name" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>
    </div>
@endsection()