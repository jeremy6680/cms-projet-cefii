	<div class="row">
		<div class="small-12 large-12 column">
			<footer class="site-footer">
				<p>Copyright @JM2014
<span class="right">
			{{-- HTML::link('admin','Admin') --}}
			<a href="{{URL::to('/')}}">Voir le site <span class="fi-eye icon" title="icon voir" aria-hidden="true"></span></a> | 
			{{-- HTML::link('auth/logout','Se déconnecter') --}}
			<a href="{{ URL::route('logout') }}">Me déconnecter <span class="fi-power-standby icon" title="icon power icon" aria-hidden="true"></span></a>
</span>
				</p>
			</footer>
		</div>
	</div>
</div>

    {{ HTML::script('js/foundation.min.js') }}
    {{-- HTML::script('js/markitup/jquery.markitup.js') --}}
    {{-- HTML::script('js/markitup/set.js') --}}
	<script type="text/javascript" src="http://lab.lepture.com/editor/editor.js"></script>
	<script type="text/javascript" src="http://lab.lepture.com/editor/marked.js"></script>
    {{ HTML::script('js/app.js') }}
    <script>
      $(document).foundation();
    </script>
  </body>
</html>