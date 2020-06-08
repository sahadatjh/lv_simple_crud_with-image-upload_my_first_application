@extends('welcome')
@section('content')
<ul>
	<li>ID: {{$post->id}}</li>
	<li><img src="{{url( $post->image) }}"> </li>
	<li>Name: {{$post->name}}</li>
	<li>Name: {{$post->title}}</li>
	<li>Slug: {{$post->detail}}</li>
	<li>Create at: {{$post->created_at}}</li>
</ul>
@endsection()