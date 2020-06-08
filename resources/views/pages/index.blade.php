@extends('welcome')
@section('content')
<div class="row">
      <div class="col-md-10 mx-auto">
        @foreach($post as $row)
        <div class="post-preview">
          <h3 class="post-title">
              {{ $row->title}}
            </h3>
          <a href="#">
            <img src="{{$row->image}}" style="height: 300px;width: 500px; margin: 20px"align="left">
            
            <h3 class="post-subtitle">
               {{ $row->detail}}
            </h3>
          </a>
          <p class="post-meta">Created at 
            <a href="#"> {{ $row->created_at}} || {{ $row->slug}}</p>
        </div>        
        <hr>
        @endforeach
        <p>
        {{$post->links()}}
       </p>
      </div>

      
    </div>
@endsection()