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