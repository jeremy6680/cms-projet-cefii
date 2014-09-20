@extends('templates.default')

@section('content')

			{{ Form::model($post, array('route' => ['posts.update', $post->id], 'method' => 'PUT') ) }}
				{{ Form::label('title', "Titre de l'article") }}
				{{ Form::text('title') }}
				{{ $errors->first('title', '<small class="error">:message</small>') }}
				{{ Form::textarea('content') }}
				{{ $errors->first('content', '<small class="error">:message</small>') }}
				{{ Form::submit('Mettre à jour', array('class' => 'button')) }}
			{{ Form::close()}}

@stop
