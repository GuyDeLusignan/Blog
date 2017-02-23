$(document).ready(function($) {
	
	function closeEditMode() {
		//Cacaher l'onglet édition
		$("a[href='#editerPill']").fadeOut('fast');
		//Switch to l'onglet ajouter
		$("a[href='#ajouterPill']").tab('show');
		//Reset le formulaire d'édition
		$('.formEditArticle')[0].reset();
		//Supprime le marqueur de l'article en édition dans la liste des articles
		$('.table-line').removeClass('editLineColor');
	}

	//Annuler l'édition
	$("body").on('click', '.buttonAnnuler', function(event) {
		event.preventDefault();
		//Cacaher l'onglet édition
		closeEditMode();
	})

	//Charger les données de l'article à éditer
	$("body").on('click', '.icon-pencil', function() {
		//Stock l'id de l'article à éditer
		var	articleToEdit = $(this).parent(),
			idArticleToEdit = articleToEdit.attr('id');
		//Clone l'id dans le formulaire d'édition pour l'envoi des données
		$('.formEditArticle').attr('data-id', idArticleToEdit);
		//on enleve les reperes de la liste des articles
		$('.table-line').removeClass('editLineColor');
		//Et on ajoute un repere sur l'article en édition dans la liste des articles
		$(this).parents('.table-line').addClass('editLineColor');

		$.ajax({
			method: 'POST',
			url: 'controller/postsController.php',
			data: {idArticleToEdit: idArticleToEdit}
		}).done(function (response) {
			console.log(response);
			//Convertion chaine JSON en objet
			response = JSON.parse(response);
			$(".debug-body").html(response);

			//Activation de l'onglet + Changement d'onglet
			$("a[href='#editerPill']").fadeIn('fast', function() {
			}).tab('show');
			
			//Chargement des valeurs dans le formulaire
			$("#titleEdit").val(response[0]['titre']);
			$("#bodyEdit").val(response[0]['body']);
			$("#authorEdit").val(response[0]['auteur']);
		})
	})

	//Edition de l'article dans la base de données
	$("body").on('click', '.buttonFormEdit', function(event) {
		event.preventDefault();
		//Stock les valeurs des éléments du formulaire dans un form data
		var form = new FormData($(".formEditArticle")[0]),
			idArticleToEdit = $('.formEditArticle').attr('data-id');
		//Ajoute l'id de l'article dans le form data
		form.append('idEdit', idArticleToEdit);
		
		$.ajax({
			method: 'POST',
			url: 'controller/postsController.php',
			contentType: false,
			processData: false,	//No string conversion
			data: form,
		}).done(function(response) {
			if(response === 'edited') {
				var titre = $("#titleEdit").val(),
					auteur = $("#authorEdit").val();

				//Changement des textes dans la liste des articles
				$("#"+idArticleToEdit).siblings('.titre').fadeToggle('fast', function() {
					$(this).html(titre).fadeToggle('fast');
				});
				$("#"+idArticleToEdit).siblings('.auteur').fadeToggle('fast', function() {
					$(this).html(auteur).fadeToggle('fast');
				});

				//Retour à l'ajout d'articles et ferme edition
				closeEditMode();
			}
		})

	})

});