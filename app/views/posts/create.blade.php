<div class="row">
	<div class="medium-10 medium-centered large-8 columns">
		<h2 class="new-post">
		    Ajouter un nouvel article
		    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
		</h2>
		<hr>
		{{ Form::open( array('route' => 'posts.store') )}}
			<div class="editor-wrapper">
			{{ Form::text('title',"Titre de l'article",array('class' => 'title')) }}
			{{ $errors->first('title', '<small class="error">:message</small>') }}
			<a href="{{ URL::route('photo.form') }}" class="right camera" target="_blank"><span class="fi-camera-slr icon" title="icon dashboard" aria-hidden="true"></span></a>
			{{ Form::textarea('content','',array('class' => 'ContentEditable', 'id' => 'markdown')) }}
			{{ $errors->first('content', '<small class="error">:message</small>') }}
			</div>
			{{ Form::label('category') }}
			{{ Form::text('category') }}
			{{ Form::select('draft', [false => 'Prêt à publier', true => 'Enregistrer en tant que brouillon'], false) }}
			<br>
			{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
		{{ Form::close()}}
	</div>
</div>
