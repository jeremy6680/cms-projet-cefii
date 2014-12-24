@extends('templates.default')

@section('content')
		<div class="panel callout radius">	
			<h4>Ajout d'un utilisateur</h4>

					{{ Form::open(array('route' => 'admin.user.store', 'method' => 'post')) }}	
					  <div class="{{ $errors->has('pseudo') ? 'error' : '' }}">
					  	{{ Form::text('pseudo', null, array('placeholder' => 'Pseudo')) }}
					  	<small class="{{ $errors->has('pseudo') ? 'error' : '' }}">{{ $errors->first('pseudo') }}</small>
					  </div>
					  <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
					  	{{ Form::email('email', null, array('placeholder' => 'Email')) }}
					  	<small class="{{ $errors->has('email') ? 'error' : '' }}">{{ $errors->first('email') }}</small>
					  </div>
					  <div class="form-group {{ $errors->has('password') ? 'error' : '' }}">
					  	{{ Form::password('password', array('placeholder' => 'Mot de passe')) }}
					  	 <small class="{{ $errors->has('password') ? 'error' : '' }}">{{ $errors->first('password') }}</small>
					  </div>
					  <div>
					  	{{ Form::password('Confirmation_mot_de_passe', array('placeholder' => 'Confirmation mot de passe')) }}
					  </div>
					  @if(Auth::user()->admin == 1)
						<div>
						  {{ Form::checkbox('admin') }} Administrateur
						</div>
					  @endif
						{{ Form::submit('Envoyer', array('class' => 'button small')) }}
					{{ Form::close() }}

		</div>
		<a href="javascript:history.back()" class="button small">
			Retour
		</a>
@stop