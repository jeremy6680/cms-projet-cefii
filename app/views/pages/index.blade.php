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
		            	@if($page->draft == 0){{'Publié'}}
		            	@else {{'Brouillon'}}
		            	@endif
		            @endif
            	</td>
			    <td>
			    	@if(Auth::user()->admin == 1) {{HTML::linkRoute('admin.pages.edit','Modifier',$page->id)}}
			    	@else{{'-'}}
			    	@endif
			    </td>
			    <td>
			    	@if(Auth::user()->admin == 1){{HTML::linkRoute('admin.pages.destroy','Supprimer',$page->id,array('onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cette page ?\')'))}}
			    	@else{{'-'}}
			    	@endif
			    </td>
			    <td>{{HTML::linkRoute('admin.pages.show','Voir',$page->id,['target'=>'_blank'])}}</td>
	    	</tr>
	    @endforeach
	    </tbody>
    </table>
    {{-- $pages->links() --}}