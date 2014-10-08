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
		
		
	// Editor Froala (à supprimer ?)
	
	$('.TitleEditable').editable({
		height: 60
	});
	
    $('.ContentEditable').editable({
    	height: 400,
    	placeholder: "Entrez le contenu de votre article ici..."
    });
    
   
   // TEST MARKDOWN
   $('#clickMe').click(function(){
   	$('#preview').toggle();
   });
   
});


