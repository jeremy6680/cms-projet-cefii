<article class="page">
    <header class="page-header">
        <h1 class="page-title">
            {{$page->title}}
        </h1>
    </header>
    <div class="page-content">
        <p>{{ Markdown::parse($page->content) }}</p>
    </div>
@if (Auth::check())
	@if(Auth::user()->admin == 1) {{HTML::linkRoute('admin.pages.edit','Modifier',$page->id)}}
	@else{{''}}
	@endif
@endif
    <footer class="page-footer">
        <hr>
    </footer>
</article>