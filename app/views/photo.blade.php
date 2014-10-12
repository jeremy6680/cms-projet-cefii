<h2 class="new-post">
    Ajouter une photo
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
    <br>

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
