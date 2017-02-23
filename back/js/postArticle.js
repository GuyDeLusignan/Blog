$(document).ready(function($) {
	
	$("#formPostArticle").on('submit', function(event) {
		event.preventDefault();
		//Serialize les données du formulaire
		var contenuFormulaire = $(this).serializeArray();

		//REQUETE AJAX envoyant les données du formulaire
		$.ajax({
			method: 'POST',
			url: 'controller/postsController.php',
			data: contenuFormulaire,
		}).done(function(response) {
			console.log(response);
			$(".debug-body").html(response);
			//Convert response into an object
			response = JSON.parse(response);
			//Reset le formulaire
			$('#formPostArticle')[0].reset();
			//Ajoute une nouvelle ligne au tableau
			$('.wrapper-table-line').append(
				'<div class="table-line row" style="display:none;">' +
					'<div class="col-sm-5 table-cell titre"> ' + contenuFormulaire[0]['value'] + ' </div>' +
					'<div class="col-sm-3 table-cell auteur"> ' + contenuFormulaire[2]['value'] + ' </div>' +
					'<div class="col-sm-3 table-cell date"> ' + response['dateCreation'] + ' </div>' +
					'<div class="col-sm-1 table-cell" id="' + response['idArticle'] + '">' +
						'<i class="icon-trash-empty posts-tooltip"> </i>' +
						'<i class="icon-pencil" id="editArticle"> </i>' +
					'</div>' +
				'</div>'
			);
			$('.table-line').last().slideDown('fast');
		});
	})

});