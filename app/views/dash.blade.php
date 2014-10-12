<div id="admin-menu" class="small-12 large-12 column">
		<ul>
			<li class="{{(strcmp(URL::full(), URL::to('/')) == 0) ? 'active' : ''}}">
				<a href="{{URL::to('/')}}"><span class="fi-eye icon" title="icon voir" aria-hidden="true"></span></a>
			</li>
			<hr>
			<li class="{{-- (strpos(URL::current(),route('admin'))!== false) ? 'active' : '' --}}">
				<a href="{{ URL::route('admin') }}"><span class="fi-dashboard icon" title="icon dashboard" aria-hidden="true"></span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('posts.index'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('posts.index') }}"><span class="fi-document icon" title="icon articles" aria-hidden="true"></span></a>
			</li>
			<li class="{{ (strpos(URL::current(),route('posts.create'))!== false) ? 'active' : '' }} add">
				<a href="{{ URL::route('posts.create') }}" target="_blank"><span class="fi-plus icon" title="icon ajouter icon" aria-hidden="true"></span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('admin.pages.index'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('admin.pages.index') }}"><span class="fi-file icon" title="icon pages" aria-hidden="true"></span></a>
			</li>
			<li class="{{ (strpos(URL::current(),route('admin.pages.create'))!== false) ? 'active' : '' }} add">
				<a href="{{ URL::route('admin.pages.create') }}" target="_blank"><span class="fi-plus icon" title="icon ajouter icon" aria-hidden="true"></span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('admin.menu.index'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('admin.menu.index') }}"><span class="fi-list icon" title="icon menu" aria-hidden="true"></span></a>
			</li>
			<li class="{{ (strpos(URL::current(),route('admin.menu.create'))!== false) ? 'active' : '' }} add">
				<a href="{{ URL::route('admin.menu.create') }}" target="_blank"><span class="fi-plus icon" title="icon ajouter icon" aria-hidden="true"></span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('comment.list') }}"><span class="fi-comment-square icon" title="icon commentaires" aria-hidden="true"></span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('admin.user.index'))!== false) ? 'active' : '' }}">
				@if(Auth::user()->admin == 1)
					<a href="{{ URL::route('admin.user.index') }}"><span class="fi-people icon" title="icon people" aria-hidden="true"></span></a>
				@else
					<a href="{{ URL::route('admin.user.show', Auth::user()->id) }}"><span class="fi-person icon" title="icon person" aria-hidden="true"></span></a>
				@endif
			</li >
			<hr>
			<li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >
				<a href="{{ URL::route('logout') }}"><span class="fi-power-standby icon" title="icon power icon" aria-hidden="true"></span></a>
			</li>
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
