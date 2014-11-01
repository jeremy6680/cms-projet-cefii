@extends('layouts.auth')

@section('content')
		@if(Session::has('status'))
			<div class="alert">{{ Session::get('status') }}</div>
		@else
			<div class="panel callout radius">	
				<h4>Oubli du mot de passe, entrez votre email :</h4>

						{{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'post')) }}	
							<small>{{ Session::get('error') }}</small>
						  <div class="{{ $errors->has('error') ? 'has-error' : '' }}">
						  	{{ Form::email('email', null, array('placeholder' => 'Email')) }}
						  </div>
							{{ Form::submit('Envoyer', array('class' => 'button small')) }}
						{{ Form::close() }}

			</div>
		<a href="javascript:history.back()" class="button small">
			Retour
		</a>
		@endif
@stop