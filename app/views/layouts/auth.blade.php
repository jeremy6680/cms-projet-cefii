<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Blog</title>
    <link rel="stylesheet" href="{{ asset( 'css/foundation.css' ) }}" />
    <link rel="stylesheet" href="{{ asset( 'css/auth.css' ) }}" />
    <script src="{{ asset( 'js/vendor/modernizr.js' ) }}"></script>
  </head>
  <body class="auth {{{ isset($class) ? $class : 'default' }}}">
    
    <div class="row">
      <div class="large-12 columns">
        <h1>Easy Peasy</h1>
        <h2><em>Lemon Squeezy</em></h2>
      </div>
    </div>

	@if (Session::has('message'))
	<div class="alert-box success">
		{{ Session::get('message') }}	
	</div>
	@endif

    <div class="row">
      <div class="large-8 large-offset-2 columns">
	@yield('content')
      </div>
    </div>
    {{ HTML::script('js/vendor/jquery.js') }}
    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/app.js') }}
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
