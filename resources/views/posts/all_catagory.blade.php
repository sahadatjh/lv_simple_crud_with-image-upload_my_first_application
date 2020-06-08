@extends('welcome')
@section('content')
<div class="row">
  <div class="col-md-12 mx-auto">
    <p>
      <a href="{{ route('add.catagory') }}" class="btn btn-success">Add Catagory</a>
      </p>
      <table class="table table-responsive table-striped table-bordered">
    	<thead class="bg-secondary">
        <tr>
          <th>Sl</th>
          <th>Catagory Name</th>
          <th>Slug</th>
          <th>Create at</th>
          <th>Action</th>
        </tr>
      </thead>
      @foreach($catagory as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td> {{ $row->name }}</td>
        <td>{{ $row->slug }}</td>
        <td>{{ $row->created_at }} </td>
        <td>
          <a href="{{ URL::to('view/catagory/'.$row->id) }}" class="btn btn-success">view</a>
          <a href="{{ URL::to('edit/catagory/'.$row->id) }}" class="btn btn-info">edit</a>
          <a href="{{ URL::to('delete/catagory/'.$row->id) }}" id="delete" class="btn btn-danger">delete</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection()