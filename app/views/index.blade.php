@if(!empty($notFound))
    <p>Sorry nothing found for your query!</p>
@else
    @foreach($posts as $post)
    <article class="post">
    	<header class="post-header">
	    	<h2 class="post-title">
	    	{{link_to_route('posts.show',$post->title,$post->id)}}
	    	</h2>
	    	<div class="clearfix">
			    <span class="left date">Publié le {{ $post->created_at->format('j F Y') }}</span>
			    <span class="right label">{{$post->comment_count}} commentaires</span>
	    	</div>
    	</header>
    	<div class="post-content">
			{{ Markdown::parse(Str::limit($post->content, 300)) }}
		    <span>{{link_to_route('posts.show',"Lire l'article en intégralité",$post->id)}}
    	</div>
    	<footer class="post-footer">
   			<hr>
    	</footer>
    </article>
    @endforeach
    {{-- $posts->links() --}}
    @endif