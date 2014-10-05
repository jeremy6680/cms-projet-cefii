<h2 class="new-post">
    Ajouter un nouvel onglet pour le menu
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open( array('route' => 'admin.menu.store') )}}
	{{ Form::label('name') }}
	{{ Form::text('name') }}
	{{ $errors->first('name', '<small class="error">:message</small>') }}
	{{ Form::label('position') }}
	{{ Form::text('position') }}
	{{ $errors->first('position', '<small class="error">:message</small>') }}
	{{ Form::label('route') }}
	{{ Form::text('route') }}
	{{ $errors->first('route', '<small class="error">:message</small>') }}

	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}
