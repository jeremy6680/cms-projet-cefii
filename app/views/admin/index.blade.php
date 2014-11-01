<h2 class="post-listings">Admin</h2><hr>

<p>Salut {{ $user }}, Bienvenu au tableau de bord !</p>

		<ul>
			<li class="{{ (strpos(URL::current(), URL::to('admin/'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('admin') }}"><span class="fi-dashboard icon" title="icon dashboard" aria-hidden="true"> Tableau de bord</span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(), URL::to('admin.menu.index'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('admin.menu.index') }}"><span class="fi-list icon" title="icon menu" aria-hidden="true"> Gestion du Menu</span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('admin.pages.index'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('admin.pages.index') }}"><span class="fi-file icon" title="icon pages" aria-hidden="true"> Gestion des Pages</span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('posts.index'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('posts.index') }}"><span class="fi-document icon" title="icon articles" aria-hidden="true"> Gestion des Articles</span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
				<a href="{{ URL::route('comment.list') }}"><span class="fi-comment-square icon" title="icon commentaires" aria-hidden="true"> Gestion des Commentaires</span></a>
			</li>
			<hr>
			<li class="{{-- (strpos(URL::current(),route('photo.form'))!== false) ? 'active' : '' --}}">
				<a href="{{ URL::route('photo.form') }}"><span class="fi-camera-slr icon" title="icon dashboard" aria-hidden="true"> Ajouter une photo</span></a>
			</li>
			<hr>
			<li class="{{ (strpos(URL::current(),route('admin.user.index'))!== false) ? 'active' : '' }}">
				@if(Auth::user()->admin == 1)
					<a href="{{ URL::route('admin.user.index') }}"><span class="fi-people icon" title="icon people" aria-hidden="true"> Gestion des Utilisateurs</span></a>
				@else
					<a href="{{ URL::route('admin.user.show', Auth::user()->id) }}"><span class="fi-person icon" title="icon person" aria-hidden="true"> Voir mon Profil</span></a>
				@endif
			</li >
			<hr>
			<li class="{{ (strpos(URL::current(), URL::to('logout'))!== false) ? 'active' : '' }}" >
				<a href="auth/logout"><span class="fi-power-standby icon" title="icon power icon" aria-hidden="true"> Me déconnecter</span></a>
			</li>
		</ul>	