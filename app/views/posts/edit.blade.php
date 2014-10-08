<h2 class="new-post">
    Modifier l'article
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::model($post, array('route' => ['posts.update', $post->id], 'method' => 'PUT') ) }}
	{{ Form::label('title', "Titre de l'article") }}
	{{ Form::text('title') }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	{{ Form::textarea('content') }}
	<div id="clickMe">Preview</div>
	<div id="preview">{{ Markdown::parse($post->content) }}</div>
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	{{ Form::label('category') }}
	{{ Form::text('category') }}
	{{ Form::select('draft', [false => 'Prêt à publier', true => 'Enregistrer en tant que brouillon'], $post->draft) }}
	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}

