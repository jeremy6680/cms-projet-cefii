{{ link_to_route('admin.menu.create', 'Ajouter', null, array('class' => 'button secondary small radius right')) }}
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
			    	@if(Auth::user()->admin == 1) {{HTML::linkRoute('admin.menu.edit','Modifier',$item->id)}}
			    	@else{{'-'}}
			    	@endif
			    </td>
			    <td>
			    	@if(Auth::user()->admin == 1){{HTML::linkRoute('admin.menu.destroy','Supprimer',$item->id,array('onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet onglet ?\')'))}}
			    	@else{{'-'}}
			    	@endif
			    </td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{-- $pages->links() --}}