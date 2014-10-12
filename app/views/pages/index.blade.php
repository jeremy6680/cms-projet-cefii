{{-- link_to_route('admin.pages.create', 'Ajouter', null, array('class' => 'button secondary small radius right')) --}}
<a href="{{ URL::route('admin.pages.create') }}" target="_blank"><span class="fi-plus icon button secondary small radius right" title="icon ajouter icon" aria-hidden="true"></span></a>
<h2 class="post-listings">Liste des pages</h2><hr>
    <table>
    	<thead>
    		<tr>
			    <th>Titre</th>
			    <th>Date</th>
			    <th>Statut</th>
			    <th>Modifier</th>
			    <th>Supprimer</th>
			    <th>Voir</th>
    		</tr>
    	</thead>
	    <tbody>
	    @foreach($pages as $page)
	    	<tr>
			    <td>{{$page->title}}</td>
			    <td>{{$page->created_at->format('d/m/Y')}}</td>
			    <td>
			    	@if(Auth::user()->admin == 1)
			            {{ Form::model($page, array('route' => ['pages.updateStatut', $page->id], 'method' => 'PUT') ) }}
			            {{ Form::select('draft', [false => 'Publié', true => 'Brouillon'], $page->draft, ['style'=>'margin-bottom:0','onchange'=>'submit()'])}}
			            {{Form::close()}}		    	
		            @else
		            	@if($page->draft == 0)
		            		{{'Publié'}}
		            	@else 
		            		{{'Brouillon'}}
		            	@endif
		            @endif
            	</td>
			    <td>
			    	@if(Auth::user()->admin == 1)
						{{-- HTML::linkRoute('admin.pages.edit','Modifier',$page->id) --}}
						<a href="{{ URL::route('admin.pages.edit', $page->id) }}"><span class="fi-pencil icon button small radius" title="icon modifier icon" aria-hidden="true"></span></a>
			    	@else
			    		<span class="fi-ban icon" title="icon ban icon" aria-hidden="true"></span>
			    	@endif
			    </td>
			    <td>
			    	@if(Auth::user()->admin == 1)
			    		{{-- HTML::linkRoute('admin.pages.destroy','Supprimer',$page->id,array('onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cette page ?\')')) --}}
			    		<a href="{{ URL::route('admin.pages.destroy', $page->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cette page ?')"><span class="fi-trash icon button small alert radius" title="icon poubelle icon" aria-hidden="true"></span></a>
			    	@else
			    		<span class="fi-ban icon" title="icon ban icon" aria-hidden="true"></span>
			    	@endif
			    </td>
			    <td>
			    	{{-- HTML::linkRoute('admin.pages.show','Voir',$page->id,['target'=>'_blank']) --}}
			    	<a href="{{ URL::route('admin.pages.show', $page->id) }}" target="_blank"><span class="fi-eye icon button success small radius" title="icon voir icon" aria-hidden="true"></span></a>
			    </td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{-- $pages->links() --}}