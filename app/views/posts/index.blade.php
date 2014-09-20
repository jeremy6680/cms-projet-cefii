@extends('templates.default')

@section('title')Liste des articles @stop

@section('content')

	{{ link_to_route('posts.create', 'Créer un nouvel article', null, ['class' => 'success button']) }}
	
	@if($posts->count())
		@foreach($posts as $post)
			<h4>{{ link_to_route('posts.show', $post->title, [$post->slug] )}}</h4>
			<ul class="no-bullet button-group">
				<li>
					{{ link_to_route('posts.edit', 'modifier', [$post->slug], ['class' => 'tiny button']) }}
				</li>
				<li>
					{{ Form::model($post, [ 'route' => ['posts.destroy', $post->id], 'method' => 'DELETE' ]) }}
						{{ Form::button('supprimer', ['type' => 'submit', 'class' => 'tiny alert button']) }}
					{{ Form::close() }}
				</li>
			</ul>
		@endforeach
	@endif

@stop
