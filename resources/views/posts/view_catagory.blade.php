@extends('welcome')
@section('content')
<ul>
	<li>ID: {{$cat->id}}</li>
	<li>Name: {{$cat->name}}</li>
	<li>Slug: {{$cat->slug}}</li>
	<li>Create at: {{$cat->created_at}}</li>
</ul>
@endsection()