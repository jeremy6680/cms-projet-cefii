@extends('templates.default')

@section('content')

			{{ Form::model($post, array('route' => ['posts.update', $post->id], 'method' => 'PUT') ) }}
				@include('posts.partials._form')
			{{ Form::close()}}

@stop
