<h2 class="new-post">
    Ajouter un nouvel onglet pour le menu
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open( array('route' => 'admin.menu.store') )}}
	{{ Form::label('route', 'Vers quelle page doit mener ce lien ?') }}
	{{ Form::select('route', array(
		'Page' => Page::all()->lists('title', 'id'),
		'Catégorie' => Post::distinct()->lists('category')
		), null, ['class' => 'field']) }}
	{{ Form::label('name', 'Quel nom souhaitez-vous afficher dans le menu pour ce lien ?') }}
	{{ Form::text('name') }}
	{{ $errors->first('name', '<small class="error">:message</small>') }}
	{{ Form::label('position') }}
	{{ Form::text('position') }}
	{{ $errors->first('position', '<small class="error">:message</small>') }}

	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}
