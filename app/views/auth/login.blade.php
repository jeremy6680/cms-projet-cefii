@extends('templates.default')

@section('content')
		@if(Session::has('error'))
			<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif		
		<div class="panel callout radius">	
			<h4>Connectez-vous !</h4>
					{{ Form::open(array('url' => 'auth/login', 'method' => 'post')) }}	
					  <div class="{{ $errors->has('pseudo') ? 'error' : '' }}">
					  	{{ Form::text('pseudo', null, array('placeholder' => 'Pseudo')) }}
					  	<small>{{ $errors->first('pseudo') }}</small>
					  </div>
					  <div class="{{ $errors->has('pseudo') ? 'error' : '' }}">
					  	{{ Form::password('password', array('placeholder' => 'Mot de passe')) }}
					  	<small>{{ Session::get('pass') }}</small>
					  </div>
						<div class="checkbox">
						  {{ Form::checkbox('souvenir') }} Se rappeler de moi
						</div>
						{{ Form::submit('Envoyer', array('class' => 'button small')) }}
					{{ Form::close() }}
		</div>
		<a href="javascript:history.back()" class="button small">
			Retour
		</a>
		{{ link_to('password/remind', 'J\'ai oublié mon mot de passe !', array('class' => 'button small alert right')) }}
@stop