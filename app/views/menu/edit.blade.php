<h2 class="new-page">
    Modifier le menu
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::model($menu, array('route' => ['admin.menu.update', $menu->id], 'method' => 'PUT') ) }}
	{{ Form::label('name', "Item") }}
	{{ Form::text('name') }}
	{{ $errors->first('name', '<small class="error">:message</small>') }}
	{{ Form::text('position') }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}

