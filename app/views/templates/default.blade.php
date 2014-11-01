@include('templates.partials.header')

@if (Session::has('message'))
<div class="alert-box success">
	{{ Session::get('message') }}	
</div>
@endif

    <div class="row">
      <div class="large-12 columns">
	@yield('content')
      </div>
    </div>
@include('templates.partials.footer')
