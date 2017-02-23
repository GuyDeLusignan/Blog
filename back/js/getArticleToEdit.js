$(document).ready(function($) {
	
	$("body").on('click', '.icon-pencil', function() {
		var idArticleToEdit = $(this).parent().attr('id');

		$.ajax({
			method: 'POST',
			url: 'controller/postsController.php',
			data: {idArticleToEdit: idArticleToEdit}
		}).done(function (response) {
			//Convertion chaine JSON en objet
			response = JSON.parse(response);

			//Changement de tab vers edition
			$('.nav-pills a[href="#editerPill"]').tab('show');

			//Chargement des valeurs dans le formulaire à éditer
			$("#titleEdit").val(response[0]['titre']);
			$("#bodyEdit").val(response[0]['body']);
			$("#authorEdit").val(response[0]['auteur']);
			$("#idEdit").val(response[0]['id']);
		})
	})

});