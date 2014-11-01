<h2 class="comment-listings">Liste des commentaires</h2><hr>
<table>
    <thead>
    <tr>
        <th>Auteur</th>
        <th>Email</th>
        <th>Article</th>
        <th>Approuvé</th>
        <th>Supprimer</th>
        <th>Voir</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
    <tr>
        <td>{{{$comment->commenter}}}</td>
        <td>{{{$comment->email}}}</td>
        <td>{{{$comment->post->title}}}</td> <!-- BUG A RESOUDRE LORSQUE CODE grisé dans CommentController listComment est activé-->
        <td>
            {{Form::open(['route'=>['comment.update',$comment->id]])}}
            {{Form::select('status',['yes'=>'Oui','no'=>'Non'],$comment->approved,['style'=>'margin-bottom:0','onchange'=>'submit()'])}}
            {{Form::close()}}
        </td>
        <td>
        	{{-- HTML::linkRoute('comment.delete','Supprimer',$comment->id,array('onclick' => 'return confirm(\'Voulez-vous vraiment supprimer ce commentaire ?\')')) --}}
        	<a href="{{ URL::route('comment.delete', $comment->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?')"><span class="fi-trash icon" title="icon poubelle icon" aria-hidden="true"></span></a>
        </td>
        <td>
        	{{-- HTML::linkRoute('comment.show','Vue rapide',$comment->id,['data-reveal-id'=>'comment-show','data-reveal-ajax'=>'true']) --}}
        	<a href="{{ URL::route('comment.show', $comment->id) }}" target="_blank" data-reveal-id='comment-show' data-reveal-ajax='true'><span class="fi-eye icon" title="icon voir icon" aria-hidden="true"></span></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $comments->links() }}
