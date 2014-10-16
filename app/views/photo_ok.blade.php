<h2 class="new-post">
    Ajouter une photo
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
    <br>

		<div class="panel panel-info">
			<div class="panel-body"> 
				Cool ! Votre photo a bien été reçue et enregistrée.<br>
				Chemin d'accès (à copier sans le <em>http://</em> pour insérer la photo):<br> 
				<strong class="image-path">{{ asset($path) }}</strong>
			</div>
		</div>

