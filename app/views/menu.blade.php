<ul class="right">
	@foreach($menuItems as $item)
	<li class="{{ (strpos(URL::current(),$item->route)!== false) ? 'active' : '' }}">{{HTML::linkRoute('page',$item->name,$item->route)}}</li>
	@endforeach
</ul>