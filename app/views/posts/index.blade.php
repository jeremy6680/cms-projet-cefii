

<h2 class="post-listings">Liste des articles</h2><hr>
    <table>
    	<thead>
    		<tr>
			    <th width="240">
			    @if ($sortby == 'title' && $order == 'asc') {{
                        link_to_action(
                            'PostController@index',
                            'Title',
                            array(
                                'sortby' => 'title',
                                'order' => 'desc'
                            )
                        )
                    }}
                    @else {{
                        link_to_action(
                            'PostController@index',
                            'Title',
                            array(
                                'sortby' => 'title',
                                'order' => 'asc'
                            )
                        )
                    }}
                @endif
			    </th>
			    <th width="80">
			    @if ($sortby == 'created_at' && $order == 'asc') {{
                        link_to_action(
                            'PostController@index',
                            'Date',
                            array(
                                'sortby' => 'created_at',
                                'order' => 'desc'
                            )
                        )
                    }}
                    @else {{
                        link_to_action(
                            'PostController@index',
                            'Date',
                            array(
                                'sortby' => 'created_at',
                                'order' => 'asc'
                            )
                        )
                    }}
                @endif
			    </th>
			    <th width="100">
			    @if ($sortby == 'draft' && $order == 'asc') {{
                        link_to_action(
                            'PostController@index',
                            'Statut',
                            array(
                                'sortby' => 'draft',
                                'order' => 'desc'
                            )
                        )
                    }}
                    @else {{
                        link_to_action(
                            'PostController@index',
                            'Statut',
                            array(
                                'sortby' => 'draft',
                                'order' => 'asc'
                            )
                        )
                    }}
                @endif
			    </th>
			    <th width="80">Auteur</th>
			    <th width="80">Modifier</th>
			    <th width="80">Supprimer</th>
			    <th width="80">Voir</th>
    		</tr>
    	</thead>
	    <tbody>
	    @foreach($posts as $post)
	    	<tr>
			    <td>{{$post->title}}</td>
			    <td>{{$post->created_at->format('d/m/Y')}}</td>
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