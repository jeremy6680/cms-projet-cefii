

<h2 class="post-listings">Liste des articles</h2><hr>
    <table>
    	<thead>
    		<tr>
			    <th width="240">{{ SortableTrait::link_to_sorting_action('title', 'Titre') }}</th>
			    <th width="100">Statut</th>
			    <th width="100">Auteur</th>
			    <th width="100">Modifier</th>
			    <th width="100">Supprimer</th>
			    <th width="100">Voir</th>
    		</tr>
    	</thead>
	    <tbody>
	    @foreach($posts as $post)
	    	<tr>
			    <td>{{$post->title}}</td>
			    <td>
            {{ Form::model($post, array('route' => ['posts.updateStatut', $post->id], 'method' => 'PUT') ) }}
            {{ Form::select('draft', [false => 'Publié', true => 'Brouillon'], $post->draft, ['style'=>'margin-bottom:0','onchange'=>'submit()'])}}
            {{Form::close()}}
            	</td>
            	<td>{{$post->user->pseudo}}</td>
			    <td>{{HTML::linkRoute('posts.edit','Modifier',$post->id)}}</td>
			    <td>{{HTML::linkRoute('posts.destroy','Supprimer',$post->id)}}</td>
			    <td>{{HTML::linkRoute('posts.show','Voir',$post->id,['target'=>'_blank'])}}</td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{-- $posts->links() --}}