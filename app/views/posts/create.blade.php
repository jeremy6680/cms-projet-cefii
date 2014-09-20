@extends('templates.default')

@section('content')
			{{ Form::open( array('route' => 'posts.store') )}}
				@include('posts.partials._form')
			{{ Form::close()}}
@stop
