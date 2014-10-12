<ul class="right">
	@if(Auth::check())
		<li>
			{{-- HTML::link('admin','Admin') --}}
			<a href="{{ URL::route('admin') }}"><span class="fi-dashboard icon" title="icon dashboard" aria-hidden="true"></span></a>
		</li>
		<li>
			{{-- HTML::link('auth/logout','Se déconnecter') --}}
			<a href="{{ URL::route('logout') }}"><span class="fi-power-standby icon" title="icon power icon" aria-hidden="true"></span></a>
		</li>
	@else
		<li>
			{{-- HTML::link('auth/login','Se connecter') --}}
			<a href="{{ URL::route('login') }}"><span class="fi-account-login icon" title="icon login icon" aria-hidden="true"></span></a>
		</li>
	@endif
</ul>
<ul class="right">
	@foreach($menuItems as $item)
		<li class="{{ (strpos(URL::current(),$item->route)!== false) ? 'active' : '' }}">{{HTML::linkRoute('page',$item->name,$item->route)}}</li>
	@endforeach
</ul>