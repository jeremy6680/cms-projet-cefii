
		@if(Session::has('ok'))
			<div data-alert class="alert-box success radius">{{ Session::get('ok') }}</div>
		@endif

				{{-- link_to_route('admin.user.create', 'Ajouter', null, array('class' => 'button secondary small radius right')) --}}
				<a href="{{ URL::route('admin.user.create') }}" target="_blank"><span class="fi-plus icon button secondary small radius right" title="icon ajouter icon" aria-hidden="true"></span></a>
				<h2>Liste des utilisateurs</h2><hr>

			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Modifier</th>
						<th>Supprimer</th>
						<th>Voir</th>
					</tr>
				</thead>
				<tbody>
				  @foreach ($users as $user)
				    <td>{{ $user->id }}</td>
				    <td><strong>{{ $user->pseudo }}</strong></td>
				    <td>{{-- link_to_route('admin.user.edit', 'Modifier', array($user->id), array('class' => 'button small radius')) --}}
				    	<a href="{{ URL::route('admin.user.edit', $user->id) }}"><span class="fi-pencil icon" title="icon modifier icon" aria-hidden="true"></span></a>
				    </td>
				    <td>
							{{-- Form::open(array('method' => 'DELETE', 'route' => array('admin.user.destroy', $user->id))) --}}
								{{-- Form::submit('Supprimer', array('class' => 'button alert small radius', 'onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet utilisateur ?\')')) --}}
							{{-- Form::close() --}}
					<a href="{{ URL::route('admin.user.destroy', $user->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"><span class="fi-trash icon" title="icon poubelle icon" aria-hidden="true"></span></a>
				    </td>
				    <td>
				    	{{-- link_to_route('admin.user.show', 'Voir', array($user->id), array('class' => 'button success small radius')) --}}
				    	<a href="{{ URL::route('admin.user.show', $user->id) }}" target="_blank"><span class="fi-eye icon" title="icon voir icon" aria-hidden="true"></span></a>
				    </td>
				    </tr>
				  @endforeach
	  		</tbody>
			</table>

		{{ $users->links(); }}