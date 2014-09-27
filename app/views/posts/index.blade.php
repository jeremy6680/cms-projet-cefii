

<h2 class="post-listings">Liste des articles</h2><hr>
    <table>
    	<thead>
    		<tr>
			    <th width="300">Titre</th>
			    <th width="120">Modifier</th>
			    <th width="120">Supprimer</th>
			    <th width="120">Voir</th>
    		</tr>
    	</thead>
	    <tbody>
	    @foreach($posts as $post)
	    	<tr>
			    <td>{{$post->title}}</td>
			    <td>{{HTML::linkRoute('posts.edit','Modifier',$post->id)}}</td>
			    <td>{{HTML::linkRoute('posts.destroy','Supprimer',$post->id)}}</td>
			    <td>{{HTML::linkRoute('posts.show','Voir',$post->id,['target'=>'_blank'])}}</td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{-- $posts->links() --}}