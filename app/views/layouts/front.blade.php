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
	{{ HTML::style('http://lab.lepture.com/editor/editor.css') }}
	{{ HTML::style('css/open-iconic-foundation.css') }}
	{{ HTML::style('css/foundation.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Quattrocento:400,700') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Fanwood+Text:400,400italic') }}
	{{ HTML::style('css/custom.css') }}
     
</head>
<body class="front {{{ isset($class) ? $class : 'default' }}}">
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=332265373511735&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="site-wrapper">
<div class="row">
	<div class="small-12 large-12 column" id="masthead">
		<header>
			{{-- HTML::image('img/road.jpg', $alt="", $attributes = array()) --}}
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
					@include('menu')
					<!--
					<ul class="right">
						@if(Auth::check())
							<li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >
								{{HTML::link('auth/logout','Se déconnecter')}}
							</li>
						@else
							<li class="{{ (strpos(URL::current(), URL::to('login'))!== false) ? 'active' : '' }}">
								{{HTML::link('auth/login','Se connecter')}}
							</li>
						@endif
					</ul>
				-->
				</section>
			</nav>
			<!--
			<div class="sub-header">
				<hgroup>
					<h1>{{HTML::link('/','My Blog')}}</h1>
					<h2>Coucou, voici le front</h2>
				</hgroup>
			</div>
			-->
		</header>
	</div>
</div>

@if (Session::has('message'))
<div class="alert-box success">
	{{ Session::get('message') }}	
</div>
@endif

 <div class="row main">
{{$main}}
</div>

	<div class="row">
		<div class="small-12 large-12 column">
			<footer class="site-footer">
				<p>Copyright @JM2014
<span class="right">
	@if(Auth::check())
			{{-- HTML::link('admin','Admin') --}}
			<a href="{{ URL::route('admin') }}">Voir l'administration <span class="fi-dashboard icon" title="icon dashboard" aria-hidden="true"></span></a> | 
			{{-- HTML::link('auth/logout','Se déconnecter') --}}
			<a href="{{ URL::route('logout') }}">Me déconnecter <span class="fi-power-standby icon" title="icon power icon" aria-hidden="true"></span></a>
	@else
			{{-- HTML::link('auth/login','Se connecter') --}}
			<a href="{{ URL::route('login') }}">Me connecter <span class="fi-account-login icon" title="icon login icon" aria-hidden="true"></span></a>
	@endif
</span>
				</p>
			</footer>
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
