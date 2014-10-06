@include('layouts.partials.header')

<div class="row">
 	
	@if (Session::has('message'))
	<div class="small-12 large-12 column">
		<div class="alert-box success">
			{{ Session::get('message') }}	
		</div>
	</div>
	@endif

{{$main}}
</div>

@include('layouts.partials.footer')
