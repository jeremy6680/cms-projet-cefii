@include('layouts.partials.header')

@if (Session::has('message'))
<div class="alert-box success">
	{{ Session::get('message') }}	
</div>
@endif

 <div class="row">
{{$main}}
</div>

@include('layouts.partials.footer')
