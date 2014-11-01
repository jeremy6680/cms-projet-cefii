{{-- link_to_route('posts.create', 'Ajouter', null, array('class' => 'button secondary small radius right')) --}}
<a href="{{ URL::route('posts.create') }}" target="_blank"><span class="fi-plus icon button secondary small radius right" title="icon ajouter icon" aria-hidden="true"></span></a>
<h2 class="post-listings">Liste des articles</h2><hr>
    <table>
    	<thead>
    		<tr>
			    <th>
			    @if ($sortby == 'title' && $order == 'asc') {{
                        link_to_action(
                            'PostController@index',
                            'Titre',
                            array(
                                'sortby' => 'title',
                                'order' => 'desc'
                            )
                        )
                    }}
                    @else {{
                        link_to_action(
                            'PostController@index',
                            'Titre',
                            array(
                                'sortby' => 'title',
                                'order' => 'asc'
                            )
                        )
                    }}
                @endif
			    </th>
			    <th>
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
			    <th>
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
			    <th>Auteur</th>
			    <th>Modifier</th>
			    <th>Supprimer</th>
			    <th>Voir</th>
    		</tr>
    	</thead>
	    <tbody>
	    @foreach($posts as $post)
	    	<tr>
			    <td>{{$post->title}}</td>
			    <td>{{$post->created_at->format('d/m/Y')}}</td>
			    <td>
			    	@if(Auth::user()->admin == 1)
			            {{ Form::model($post, array('route' => ['posts.updateStatut', $post->id], 'method' => 'PUT') ) }}
			            {{ Form::select('draft', [false => 'Publié', true => 'Brouillon'], $post->draft, ['style'=>'margin-bottom:0','onchange'=>'submit()'])}}
			            {{Form::close()}}		    	
			    	@elseif(Auth::user()->pseudo == $post->user->pseudo)
			            {{ Form::model($post, array('route' => ['posts.updateStatut', $post->id], 'method' => 'PUT') ) }}
			            {{ Form::select('draft', [false => 'Publié', true => 'Brouillon'], $post->draft, ['style'=>'margin-bottom:0','onchange'=>'submit()'])}}
			            {{Form::close()}}
		            @else
		            	@if($post->draft == 0){{'Publié'}}
		            	@else {{'Brouillon'}}
		            	@endif
		            @endif
            	</td>
            	<td>{{$post->user->pseudo}}</td>
			    <td>
			    	@if(Auth::user()->admin == 1) 
			    		{{-- HTML::linkRoute('posts.edit','Modifier',$post->id) --}}
			    		<a href="{{ URL::route('posts.edit', $post->id) }}"><span class="fi-pencil icon" title="icon modifier icon" aria-hidden="true"></span></a>
			    	@elseif(Auth::user()->pseudo == $post->user->pseudo)
			    		<a href="{{ URL::route('posts.edit', $post->id) }}"><span class="fi-pencil icon" title="icon modifier icon" aria-hidden="true"></span></a>
			    	@else
			    		<span class="fi-ban icon" title="icon ban icon" aria-hidden="true"></span>
			    	@endif
			    </td>
			    <td>
			    	@if(Auth::user()->admin == 1)
			    		{{-- HTML::linkRoute('posts.destroy','Supprimer',$post->id,array('onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet article ?\')')) --}}
			    		<a href="{{ URL::route('posts.destroy', $post->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')"><span class="fi-trash icon" title="icon poubelle icon" aria-hidden="true"></span></a>
			    	@elseif(Auth::user()->pseudo == $post->user->pseudo)
			    		{{-- HTML::linkRoute('posts.destroy','Supprimer',$post->id,array('onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet article ?\')')) --}}
			    		<a href="{{ URL::route('posts.destroy', $post->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')"><span class="fi-trash icon" title="icon poubelle icon" aria-hidden="true"></span></a>
			    	@else
			    		<span class="fi-ban icon" title="icon ban icon" aria-hidden="true"></span>
			    	@endif
			    </td>
			    <td>
			    	<a href="{{ URL::route('posts.show', $post->id) }}" target="_blank"><span class="fi-eye icon" title="icon voir icon" aria-hidden="true"></span></a>
			    </td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{ $posts->links() }}