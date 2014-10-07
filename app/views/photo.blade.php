
    <br>
	<div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">Envoi d'une photo</div>
			<div class="panel-body"> 
				@if(Session::has('error'))
					<div class="alert alert-danger">{{ Session::get('error') }}</div>
				@endif
				{{ Form::open(array('route' => 'photo.form', 'files' => true)) }}
					<small class="text-danger">{{ $errors->first('image') }}</small>
					<div class="form-group {{ $errors->has('nom') ? 'has-error has-feedback' : '' }}">
						{{ Form::file('image', array('class' => 'form-control')) }}
					</div>
					{{ Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
