<h2 class="new-page">
    Modifier l'utilisateur
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>

		<div class="panel callout radius">	
			<h4>Modification d'un utilisateur</h4>
					{{ Form::open(array('url' => 'admin.user' . $user->id, 'method' => 'put')) }}	
					  <div class="{{ $errors->has('pseudo') ? 'error' : '' }}">
					  	{{ Form::text('pseudo', $user->pseudo, array('placeholder' => 'Pseudo')) }}
					  	<small>{{ $errors->first('pseudo') }}</small>
					  </div>
					  <div class="{{ $errors->has('email') ? 'error' : '' }}">
					  	{{ Form::email('email', $user->email, array('placeholder' => 'Email')) }}
						<small>{{ $errors->first('email') }}</small>
					  </div>
					  @if(Auth::user()->admin == 1)
						<div>
						  {{ Form::checkbox('admin', 1, $user->admin) }} Administrateur
						</div>
					  @endif
						{{ Form::submit('Envoyer', array('class' => 'button small')) }}
					{{ Form::close() }}
		</div>
		<a href="javascript:history.back()" class="button small">
			Retour
		</a>
