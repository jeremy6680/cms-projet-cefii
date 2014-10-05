<div id="admin-menu" class="small-12 large-12 column">
		<ul>
			<li class="{{ (strpos(URL::current(), URL::to('admin/'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('admin','Dashboard')}}
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(), URL::to('admin.menu.index'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('admin.menu.index','Menu')}}
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('admin.pages.index'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('admin.pages.index','Pages')}}
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('posts.index'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('posts.index','Articles')}}
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('comment.list','Commentaires')}}
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('admin.user.index'))!== false) ? 'active' : '' }}">
				@if(Auth::user()->admin == 1){{HTML::linkRoute('admin.user.index','Utilisateurs')}}
				@else{{HTML::linkRoute('admin.user.show','Mon profil',Auth::user()->id)}}
				@endif
			</li >
			<hr>
			<li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >
				{{HTML::link('auth/logout','Se déconnecter')}}
			</li>
			<hr>
		</ul>			
</div>


<div class="small-12 large-12 column">
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
