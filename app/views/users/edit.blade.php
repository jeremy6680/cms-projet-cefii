@extends('templates.default')

@section('content')
		<div class="panel callout radius">	
			<h4>Modification d'un utilisateur</h4>
					{{ Form::open(array('url' => 'user/' . $user->id, 'method' => 'put')) }}	
					  <div class="{{ $errors->has('pseudo') ? 'error' : '' }}">
					  	{{ Form::text('pseudo', $user->pseudo, array('placeholder' => 'Pseudo')) }}
					  	<small>{{ $errors->first('pseudo') }}</small>
					  </div>
					  <div class="{{ $errors->has('email') ? 'error' : '' }}">
					  	{{ Form::email('email', $user->email, array('placeholder' => 'Email')) }}
						<small>{{ $errors->first('email') }}</small>
					  </div>
						<div>
						  {{ Form::checkbox('admin', 1, $user->admin) }} Administrateur
						</div>
						{{ Form::submit('Envoyer', array('class' => 'button small')) }}
					{{ Form::close() }}
		</div>
		<a href="javascript:history.back()" class="button small">
			Retour
		</a>
@stop