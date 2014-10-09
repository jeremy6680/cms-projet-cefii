<h2 class="new-page">
    Modifier la page
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::model($page, array('route' => ['admin.pages.update', $page->id], 'method' => 'PUT') ) }}
	<div class="editor-wrapper">
	{{ Form::text('title',$page->title,array('class' => 'title')) }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	{{ Form::textarea('content') }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	</div>
	{{ Form::select('draft', [false => 'Prêt à publier', true => 'Enregistrer en tant que brouillon'], $page->draft) }}
	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}

