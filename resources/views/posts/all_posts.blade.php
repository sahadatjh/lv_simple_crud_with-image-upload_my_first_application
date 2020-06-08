@extends('welcome')
@section('content')
<div class="row">
  <div class="col-lg-12 col-md-12 mx-auto">
  	<p>
      <a href="{{ route('write.post') }}" class="btn btn-success">Add Post</a>
    </p>
    <table class="table table-responsive table-striped table-bordered">
    	<thead class="bg-secondary">
	      <tr>
	        <th>Sl</th>
	        <th>Title</th>
	        <th>Catagory</th>
	        <th>Photo</th>
	        <th>Create at</th>
	        <th width="30%">Action</th>
	      </tr>
	    </thead>
      @foreach($posts as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td> {{ $row->title }}</td>
        <td>{{ $row->name }}</td>
        <td><img src="{{URL::to($row->image) }}" height="40px" width="70px"></td>
        <td>{{ $row->created_at }} </td>
        <td>
          <a href="{{ URL::to('view/post/'.$row->id) }}" class="btn btn-success">view</a>
          <a href="{{ URL::to('edit/post/'.$row->id) }}" class="btn btn-info">edit</a>
          <a href="{{ URL::to('delete/post/'.$row->id) }}" id="delete" class="btn btn-danger">delete</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection()