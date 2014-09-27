<div class="small-3 large-3 column">
    <aside class="sidebar">
    	<h3>Menu</h3>
		<ul class="side-nav">
			<li>{{HTML::link('/','Accueil')}}</li>
			<li class="divider"></li>
			<li class="{{ (strpos(URL::current(),route('posts.create'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('posts.create','Nouvel article')}}
			</li >
			<li class="{{ (strpos(URL::current(),route('posts.index'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('posts.index','Liste des articles')}}
			</li>
			<li class="divider"></li>
			<li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('comment.list','Liste des commentaires')}}
			</li>
		</ul>
    </aside>
</div>
<div class="small-9 large-9 column">
    <div class="content">
    	@if(Session::has('success'))
    	<div data-alert class="alert-box round">
    		{{Session::get('success')}}
    		<a href="#" class="close">&times;</a>
    	</div>
    	@endif
    	{{$content}}
    </div>
    <div id="comment-show" class="reveal-modal small" data-reveal>
    	{{-- quick comment using ajax --}}
    </div>
</div>