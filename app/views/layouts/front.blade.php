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
	{{ HTML::script('js/vendor/froala_editor.min.js') }}
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('css/froala_editor.min.css') }}
	{{ HTML::style('css/foundation.css') }}
	{{ HTML::style('css/custom.css') }}
     
</head>
<body>
<div class="main">
<div class="row main">
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
						@if(Auth::check())
							<li class="{{ (strpos(URL::current(),route('users.index'))!== false) ? 'active' : '' }}">
								@if(Auth::user()->admin == 1){{HTML::linkRoute('users.index','Utilisateurs')}}
								@else{{HTML::linkRoute('users.show','Mon profil',Auth::user()->id)}}
								@endif
							</li >
							<li class="{{ (strpos(URL::current(),route('posts.create'))!== false) ? 'active' : '' }}">
								{{HTML::linkRoute('posts.create','Nouvel article')}}
							</li >
							<li class="{{ (strpos(URL::current(),route('posts.index'))!== false) ? 'active' : '' }}">
								{{HTML::linkRoute('posts.index','Liste des articles')}}
							</li>
							<li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
								{{HTML::linkRoute('comment.list','Liste des commentaires')}}
							</li>
							<li class="{{ (strpos(URL::current(), URL::to('admin/dash-board'))!== false) ? 'active' : '' }}">
								{{HTML::linkRoute('admin','Dashboard')}}
							</li>
							<li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >
								{{HTML::link('auth/logout','Se déconnecter')}}
							</li>
						@else
							<li class="{{ (strpos(URL::current(), URL::to('login'))!== false) ? 'active' : '' }}">
								{{HTML::link('auth/login','Se connecter')}}
							</li>
						@endif
					</ul>
				</section>
			</nav>
			<div class="sub-header">
				<hgroup>
					<h1>{{HTML::link('/','My Blog')}}</h1>
					<h2>Coucou, voici le front</h2>
				</hgroup>
			</div>
		</header>
	</div>
</div>

@if (Session::has('message'))
<div class="alert-box success">
	{{ Session::get('message') }}	
</div>
@endif

 <div class="row">
{{$main}}
</div>

	<div class="row">
		<div class="small-12 large-12 column">
			<footer class="site-footer"></footer>
		</div>
	</div>
</div>

    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/app.js') }}
    <script>
      $(document).foundation();
    </script>
  </body>
</html>