@extends('templates.default')

@section('title')Latest articles @stop

@section('content')

	@if($posts->count())
		@foreach($posts as $post)
			<article>
				<h2><a href="#">{{ $post->title }}</a></h2>
				<p>Published on {{ $post->created_at->format('j F Y') }}</p>
				{{ Markdown::parse(Str::limit($post->body, 300)) }}
				<a href="#">Read more &rarr;</a>
			</article>
		@endforeach
		
	@endif

@stop
