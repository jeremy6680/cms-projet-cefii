@if(!empty($notFound))
    <p>Désolé mais rien ne correspond à votre requête !</p>
@else
    @foreach($posts as $post)
    <article class="post">
    	<div class="post-header">
	    	<h2 class="post-title">
	    	{{link_to_route('posts.show',$post->title,$post->id)}}
	    	</h2>
	    	<div class="clearfix">
			    <span class="left date">Publié le {{ $post->created_at->format('j F Y ') }}</span><br>
			    @if($post->category != NULL) 
			    <span class="left category">Dans la catégorie <em>{{ $post->category }}</em></span>
			    @endif
			    <span class="right label">{{$post->comment_count}} commentaires</span>
	    	</div>
    	</div>
    	<div class="post-content">
			{{ Markdown::parse(Str::limit($post->content, 300)) }}
		    <span>{{link_to_route('posts.show',"Lire l'article en intégralité",$post->id)}}
    	</div>
    	<div class="post-footer">
   			<hr>
    	</div>
    </article>
    @endforeach
    {{ $posts->links() }}
    @endif