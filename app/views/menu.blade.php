<ul class="right">
	@if(Auth::check())
		<li>
			{{HTML::link('admin','Admin')}}
		</li>
		<li>
			{{HTML::link('auth/logout','Se déconnecter')}}
		</li>
	@else
		<li>
			{{HTML::link('auth/login','Se connecter')}}
		</li>
	@endif
</ul>
<ul class="right">
	@foreach($menuItems as $item)
	<li class="{{ (strpos(URL::current(),$item->route)!== false) ? 'active' : '' }}">{{HTML::linkRoute('page',$item->name,$item->route)}}</li>
	@endforeach
</ul>