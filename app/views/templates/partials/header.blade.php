<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Blog</title>
    <link rel="stylesheet" href="{{ asset( 'css/foundation.css' ) }}" />
    <script src="{{ asset( 'js/vendor/modernizr.js' ) }}"></script>
  </head>
  <body class="{{{ isset($class) ? $class : 'Default' }}}">
    
    <div class="row">
      <div class="large-12 columns">
		  	@if(Auth::check())
		  		<div class="button-group right">
			  		{{ link_to('posts/create', 'Créer un article', array('class' => 'success tiny button')) }}
			  		{{ link_to('auth/logout', 'Déconnexion', array('class' => 'alert tiny button')) }}
		  		</div>
		  	@else
		  		{{ link_to('auth/login', 'Se connecter', array('class' => 'success tiny button right')) }}
		  	@endif
        <h1>Easy Peasy</h1>
        <h2><em>Lemon Squeezy</em></h2>
      </div>
    </div>