{{ link_to_route('admin.menu.create', 'Ajouter', null, array('class' => 'button secondary small radius right')) }}
<h2 class="post-listings">Menu</h2><hr>
    <table>
    	<thead>
    		<tr>
			    <th>Nom</th>
			    <th>Route</th>
			    <th>Position</th>
    		</tr>
    	</thead>
	    <tbody>
	    @foreach($menuItems as $item)
	    	<tr>
			    <td>{{$item->name}}</td>
			    <td>{{$item->route}}</td>
			    <td>{{$item->position}}</td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{-- $pages->links() --}}