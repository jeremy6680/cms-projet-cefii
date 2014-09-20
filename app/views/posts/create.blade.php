@extends('templates.default')

@section('content')
			{{ Form::open( array('route' => 'posts.store') )}}
				{{ Form::label('title', "Titre de l'article") }}
				{{ Form::text('title') }}
				{{ $errors->first('title', '<small class="error">:message</small>') }}
				{{ Form::textarea('content') }}
				{{ $errors->first('content', '<small class="error">:message</small>') }}
				{{ Form::submit('Valider', array('class' => 'button')) }}
			{{ Form::close()}}
@stop
