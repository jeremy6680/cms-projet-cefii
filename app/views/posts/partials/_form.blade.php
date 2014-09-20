				{{ Form::label('title', "Titre de l'article") }}
				{{ Form::text('title') }}
				{{ $errors->first('title', '<small class="error">:message</small>') }}
				{{ Form::textarea('content') }}
				{{ $errors->first('content', '<small class="error">:message</small>') }}
				{{ Form::submit('valider', array('class' => 'button')) }}
