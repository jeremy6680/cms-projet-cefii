<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	@section('title')
		<title>{{{$title}}}</title>
	@show
	{{ HTML::script('js/vendor/modernizr.js') }}
	{{ HTML::script('js/vendor/jquery.js') }}
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Amatic+SC:400,700') }}
	{{ HTML::style('http://lab.lepture.com/editor/editor.css') }}
	{{ HTML::style('css/open-iconic-foundation.css') }}
	{{ HTML::style('css/lepture.css') }}
	{{ HTML::style('css/foundation.css') }}
	{{ HTML::style('css/admin.css') }}
     
</head>
<body class="admin">
<div class="site-wrapper">
<div class="row">
	<div class="small-12 large-12 column" id="masthead">
		<header>
			<nav class="top-bar" data-topbar>
				<ul class="title-area">
					<!-- Title Area -->
					<li class="name"></li>
					<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
					<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
				</ul>
				<section class="top-bar-section">
					<ul class="left">
						<li class="{{(strcmp(URL::full(), URL::to('/')) == 0) ? 'active' : ''}}"><a href="{{URL::to('/')}}">Easy Peasy <em>Lemon Squeezy</em></a></li>
					</ul>
					<ul class="right">
						<li class="{{ (strpos(URL::current(), route('admin.menu.index'))!== false) ? 'active' : '' }}">
							{{HTML::linkRoute('admin.menu.index','Menu')}}
						</li>
						<li class="{{ (strpos(URL::current(),route('admin.pages.index'))!== false) ? 'active' : '' }}">
							{{HTML::linkRoute('admin.pages.index','Pages')}}
						</li>
						<li class="{{ (strpos(URL::current(),route('posts.index'))!== false) ? 'active' : '' }}">
							{{HTML::linkRoute('posts.index','Articles')}}
						</li>
						<li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
							{{ HTML::linkRoute('comment.list','Commentaires') }}
						</li>
						<li class="{{ (strpos(URL::current(),route('admin.user.index'))!== false) ? 'active' : '' }}">
							@if(Auth::user()->admin == 1)
								{{ HTML::linkRoute('admin.user.index','Utilisateurs') }}
							@else
								{{ HTML::linkRoute('admin.user.show','Mon profil',Auth::user()->id) }}
							@endif
						</li >
						@if(Auth::check())
							<li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >
								{{-- HTML::link('auth/logout','Se déconnecter') --}}
								<a href="auth/logout"><span class="fi-power-standby icon" title="icon power icon" aria-hidden="true"></span></a>
							</li>
						@else
							<li class="{{ (strpos(URL::current(), URL::to('login'))!== false) ? 'active' : '' }}">
								{{HTML::link('auth/login','Se connecter')}}
							</li>
						@endif
					</ul>
				</section>
			</nav>

		</header>
	</div>
</div>