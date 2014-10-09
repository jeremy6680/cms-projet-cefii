

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
	
// TEST LEPTURE EDITOR https://github.com/lepture/editor
var editor = new Editor();
editor.render();
		
		
	// Editor Froala (à supprimer ?)
	/*
	$('.TitleEditable').editable({
		height: 60
	});
	
    $('.ContentEditable').editable({
    	height: 400,
    	placeholder: "Entrez le contenu de votre article ici...",
    	inlineMode: false
    });
    */
    /*
        $('.ContentEditable')
            .editable({
            	inlineMode: false,
                // Set the image upload parameter.
                imageUploadParam: 'image_param',

                // Set the image upload URL.
                imageUploadURL: '/uploads',

                // Additional upload params.
                imageUploadParams: {id: 'my_editor'}
            })
            .on('editable.imageError', function (e, editor, error) {
                // Custom error message returned from the server.
                if (error.code == 0) { ... }

                // Bad link.
                else if (error.code == 1) { ... }

                // No link in upload response.
                else if (error.code == 2) { ... }

                // Error during image upload.
                else if (error.code == 3) { ... }

                // Parsing response failed.
                else if (error.code == 4) { ... }

                // Image too large.
                else if (error.code == 5) { ... }

                // Invalid image type.
                else if (error.code == 6) { ... }

                // Image can be uploaded only to same domain in IE 8 and IE 9.
                else if (error.code == 7) { ... }
            });
   */
   
   // TEST MARKITUP - EDITEUR MARKDOWN (DANS POSTS CREATE)
   //$('#markdown').markItUp(myMarkdownSettings);
   
   // TEST MARKDOWN (DANS POSTS EDIT)
   $('#clickMe').click(function(){
   	$('#preview').toggle();
   });
   
});


