<ul class="right">
	@foreach($menuItems as $item)
	<li class="">{{HTML::linkRoute('page',$item->name,$item->id)}}</li>
	@endforeach
</ul>
 

<!-- 
 <li class="{{ (strpos(URL::current(),route('posts.create'))!== false) ? 'active' : '' }}">
	
</li >
-->