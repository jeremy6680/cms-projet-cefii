{{-- link_to_route('admin.menu.create', 'Ajouter', null, array('class' => 'button secondary small radius right')) --}}
<a href="{{ URL::route('admin.menu.create') }}" target="_blank"><span class="fi-plus icon button secondary small radius right" title="icon ajouter icon" aria-hidden="true"></span></a>
<h2 class="post-listings">Menu</h2><hr>
    <table>
    	<thead>
    		<tr>
    			<th>Position</th>
			    <th>Nom de l'onglet</th>
			    <th>Modifier</th>
			    <th>Supprimer</th>
    		</tr>
    	</thead>
	    <tbody>
	    @foreach($menuItems as $item)
	    	<tr>
			    <td>{{$item->position}}</td>
			    <td>{{$item->name}}</td>
			    <td>
			    	@if(Auth::user()->admin == 1) 
			    		{{-- HTML::linkRoute('admin.menu.edit','Modifier',$item->id) --}}
			    		<a href="{{ URL::route('admin.menu.edit', $item->id) }}"><span class="fi-pencil icon" title="icon modifier icon" aria-hidden="true"></span></a>
			    	@else
			    		<span class="fi-ban icon" title="icon ban icon" aria-hidden="true"></span>
			    	@endif
			    </td>
			    <td>
			    	@if(Auth::user()->admin == 1)
			    		{{-- HTML::linkRoute('admin.menu.destroy','Supprimer',$item->id,array('onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet onglet ?\')')) --}}
			    		<a href="{{ URL::route('admin.menu.destroy', $item->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cet onglet ?')"><span class="fi-trash icon" title="icon poubelle icon" aria-hidden="true"></span></a>
			    	@else
			    		<span class="fi-ban icon" title="icon ban icon" aria-hidden="true"></span>
			    	@endif
			    </td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{-- $pages->links() --}}