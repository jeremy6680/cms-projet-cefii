<h2 class="new-post">
    Ajouter une nouvelle page
    <span class="right">{{ HTML::link('admin','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open( array('route' => 'admin.pages.store') )}}
	<div class="editor-wrapper">
	{{ Form::text('title','Titre de la page',array('class' => 'title')) }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	<a href="{{ URL::route('photo.form') }}" class="right camera" target="_blank"><span class="fi-camera-slr icon" title="icon dashboard" aria-hidden="true"></span></a>
	{{ Form::textarea('content') }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	</div>
	{{ Form::select('draft', [false => 'Prêt à publier', true => 'Enregistrer en tant que brouillon'], false) }}
	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}
