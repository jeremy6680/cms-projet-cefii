<div class="row">
	<div class="medium-1 large-2 columns">
		<sidebar>
			@if (isset($previousPost))
				<div class="previous">
					<a href="{{ URL::route('posts.show', $previousPost) }}"><span class="fi-arrow-left icon"></span><br>
					<span class="navi-text">Précédent</span><br>
						@if (isset($previousPostTitle))
							<span class="navi-title">{{ $previousPostTitle }}</span>
						@endif
					</a>
				</div>
			@endif		
		</sidebar>
	</div>
	<div class="medium-10 medium-centered large-8 columns">
		<article class="post">
	
		    <header class="post-header">
		        <h2 class="post-title">
		            {{$post->title}}
		        </h2>
		        <div class="clearfix article-meta">
		            <p><em><span class="auteur">Article rédigé par {{ $post->user->pseudo}}</span>, publié le <span class="date">{{ $post->created_at->formatLocalized('%A %d %B %Y') }}</span> @if ($post->category) dans la catégorie <span class="category">{{ $post->category }}</span>@endif</em></p>
		            <!--<span class="right label">{{HTML::link('#reply','Répondre',['style'=>'color:inherit'])}} </span>-->
		        </div>
		        <div class="social">
		        	<div class="twitter-share-button"><a href="https://twitter.com/share" class="twitter-share-button left" data-via="TweetsByJey">Tweet</a></div>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					<div class="fb-like" data-href="{{ URL::current() }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
		        </div>
		    </header>
			
		    <div class="post-content">
		        <p>{{ Markdown::parse($post->content) }}</p>
		    </div>
		
		    <footer class="post-footer">
				@if (Auth::check())
					@if(Auth::user()->admin == 1) {{HTML::linkRoute('posts.edit','Modifier',$post->id)}}
					@elseif(Auth::user()->pseudo == $post->user->pseudo){{HTML::linkRoute('posts.edit','Modifier')}}
					@else{{''}}
					@endif
				@endif
		        <hr>
		    </footer>
		</article>
		<section class="comments">
		    @if(!$comments->isEmpty())
		        <h3>Commentaires sur {{$post->title}}</h3>
		        <ul>
		            @foreach($comments as $comment)
		                <li>
		                    <article>
		                        <header>
		                            <div class="clearfix">
		                                <span class="left commenter">Commentaire de {{link_to_route('posts.show',$comment->commenter,$post->id)}}</span>&nbsp;le <span class="date">{{ $comment->created_at->format('d/m/Y') }}</span> 
		                            </div>
		                        </header>
		                        <div class="comment-content">
		                            <p>{{{$comment->comment}}}</p>
		                        </div>
		                        <footer>
		                            <hr>
		                        </footer>
		                    </article>
		                </li>
		            @endforeach
		        </ul>
		    @else
		        <h3>Aucun commentaire sur {{$post->title}}</h3>
		    @endif
		    <!--comment form -->
		    @include('comments.commentform') 
		</section>	
	</div>
	<div class="medium-1 large-2 columns">
		<sidebar>
			@if (isset($nextPost))
				<div class="next">
					<a href="{{ URL::route('posts.show', $nextPost) }}"><span class="fi-arrow-right icon"></span><br>
					<span class="navi-text">Suivant</span><br>
						@if (isset($nextPostTitle))
							<span class="navi-title">{{ $nextPostTitle }}</span>
						@endif
					</a>
				</div>
			@endif		
		</sidebar>
	</div>
</div>
