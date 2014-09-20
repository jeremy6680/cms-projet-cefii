@extends('templates.default')

@section('title')Home @stop

@section('content')

	@if($posts->count())
		@foreach($posts as $post)
			<article>
				<h2><a href="{{ URL::action('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
				<p>Published on {{ $post->created_at->format('j F Y') }}</p>
				{{ Markdown::parse(Str::limit($post->content, 300)) }}
				<a href="{{ URL::action('posts.show', $post->slug) }}">Read more &rarr;</a>
			</article>
		@endforeach
		
	@endif

@stop
