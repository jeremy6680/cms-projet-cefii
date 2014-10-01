
		@if(Session::has('ok'))
			<div data-alert class="alert-box success radius">{{ Session::get('ok') }}</div>
		@endif


				<h3>Liste des utilisateurs</h3>

			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				  @foreach ($users as $user)
				    <td>{{ $user->id }}</td>
				    <td><strong>{{ $user->pseudo }}</strong></td>
				    <td>{{ link_to_route('user.show', 'Voir', array($user->id), array('class' => 'button success small radius')) }}</td>
				    <td>{{ link_to_route('user.edit', 'Modifier', array($user->id), array('class' => 'button small radius')) }}</td>
				    <td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('user.destroy', $user->id))) }}
								{{ Form::submit('Supprimer', array('class' => 'button alert small radius', 'onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet utilisateur ?\')')) }}
							{{ Form::close() }}
				    </td>
				    </tr>
				  @endforeach
	  		</tbody>
			</table>

		{{ link_to_route('user.create', 'Ajouter un utilisateur', null, array('class' => 'button secondary small radius right')) }}
		{{ $users->links(); }}