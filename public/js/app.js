$(document).ready(function() {
	
		// confirm all destroys
		$('form').submit(function( event ) {
			var method = $(this).children(':hidden[name=_method]').val();
			if ($.type(method) !== 'undefined' && method == 'DELETE') {
				if (!confirm('Êtes-vous sûr ?')) {
					event.preventDefault();
				}
			}
		});
		
		
		
    var editor = new Editor('.editable', {
            buttons: ['b', 'i', 'blockquote', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'a', 'cancel']
        });
});


