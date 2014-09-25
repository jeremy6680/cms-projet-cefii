@extends('templates.default')

@section('title') {{ $post->title }} @stop

@section('content')
			<div class="large-12 col">
				<p>{{ link_to_route('posts.index', 'back') }}</p>
				<h2>{{{ $post->title }}}</h2>
				<p><em>Publié le {{ $post->created_at->format('d M Y') }} par {{{ $post->user->pseudo }}}</em></p>
				{{ Markdown::parse($post->content) }}
			</div>
@stop
