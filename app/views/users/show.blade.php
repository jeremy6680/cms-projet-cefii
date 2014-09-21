@extends('templates.default')

@section('content')
		<div class="panel callout radius">	
			<h4>Fiche d'utilisateur</h4>
				<p>Pseudo : {{ $user->pseudo }}</p>
				<p>Email : {{ $user->email }}</p>
				@if($user->admin == 1)
					Administrateur
				@endif
		</div>				
		<a href="javascript:history.back()" class="button small radius">
			Retour
		</a>
@stop