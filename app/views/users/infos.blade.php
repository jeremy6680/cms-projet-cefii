@extends('templates.default')

@section('content')
    {{ Form::open(array('url' => 'users')) }}
        {{ Form::label('nom', 'Entrez votre nom : ') }}
        {{ Form::text('nom') }}
        {{ Form::submit('Envoyer', array('class' => 'button')) }}
	{{ Form::close() }}
@stop