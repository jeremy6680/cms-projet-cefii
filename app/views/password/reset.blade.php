@extends('layouts.auth')

@section('content')
		@if(Session::has('error'))
			<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif
		<div class="panel callout radius">	
			<div class="panel-heading">Création d'un nouveau mot de passe</div>
					{{ Form::open(array('action' => 'RemindersController@postReset', 'method' => 'post')) }}	
					  {{ Form::hidden('token', $token) }}
					  <div>
					  	{{ Form::email('email', null, array('placeholder' => 'Email')) }}
					  </div>
					  <div>
					  	{{ Form::password('password', array('placeholder' => 'Mot de passe')) }}
					  </div>
					  <div>
					  	{{ Form::password('password_confirmation', array('placeholder' => 'Confirmation mot de passe')) }}
					  </div>
					  {{ Form::submit('Envoyer', array('class' => 'button small')) }}
					{{ Form::close() }}
		</div>
@stop

