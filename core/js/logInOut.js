$(document).ready(function() {
	var animationSpeed = 100,
		linkToAdmin = 'http://localhost:8888/cogan/blog/back/posts.php';

	//Connexion
	$("body").on('submit', '.formLogin', function(event) {
		event.preventDefault();
		var form = new FormData($(".formLogin")[0]);
		form.append('state', 'login');

		$.ajax({
			url: '../core/controller/logInOutController.php',
			type: 'POST',
			contentType: false,
			processData: false,	//No string conversion
			data: form,
		})
		.done(function(response) {
			if(response === 'connected') {
				var formArray = [];
				for(var pair of form.entries()) {
					formArray.push(pair[1]);
				}

				//Affichage de deconnexion
				//Slide UP the form
				$('.dropdown').find('.dropdown-menu').first().stop(true, true).slideUp(animationSpeed, function() {
					//Fade out le bouton de deconnexion
					$('.containerLog').fadeOut(animationSpeed, function() {
						//Puis le supprime
						$(this).remove();
						//Puis on rajoute le nom d'utilisateur
						$('.navbar-right').append('<li><a href="#" class="username">' + formArray[0] + '</a></li>').hide().fadeIn(animationSpeed);
						//Et le bouton de deconnexion
						$('.navbar-right').append(
							'<li class="containerLog">' +
								'<a href="#" class="deconnexion"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a>' +
							'</li>').hide().fadeIn(animationSpeed);
						//Et le lien vers admin (avec un timeout supplémentaire)
					 	setTimeout(function() {
					 		$('.navbar-left').append('<li class="active linkToAdmin"><a href="' + linkToAdmin + '">Admin</a></li>').hide().fadeIn(animationSpeed)
					 	}, animationSpeed)  
					})
				});
			}
		})
	})

	//Deconnexion
	$("body").on('click', '.deconnexion', function(event) {
		event.preventDefault();

		$.ajax({
			url: '../core/controller/logInOutController.php',
			type: 'POST',
			data: {deconnexion : 1},
		})
		.done(function(response) {
			console.log(response);
			if(response === 'disconnected') {

				if($(location).attr('pathname').search(/\/back\//) !== -1) {
					$(location).attr('href', '../front/index.php');
				}


				//Affichage de connexion
				//On fade out le bouton de deconnexion
				$('.containerLog').fadeOut(animationSpeed, function() {
					//Puis on le supprime
					$(this).remove();
					//On affiche le bouton de connexion
					$('.navbar-right').append(
						'<li class="dropdown containerLog">' +
		 					'<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"> </span> Connexion' +
		 					'<span class="caret"></span></a>' +
		 					'<div class="dropdown-menu">' +
		 						'<form action="" class="formLogin">' +
		 							'<label for="pseudo">Pseudo :</label>' +
		 							'<input type="text" name="pseudo" required id="pseudo">' +
		 							'<label for="password">Mot de passe :</label>' +
		 							'<input type="text" name="password" required id="password">' +
									'<button type="submit" class="btn btn-primary">Envoyer</button>' +
		 						'</form>' +
					        '</div>' +
		 				'</li>').hide().fadeIn(animationSpeed);
				});
				//On supprime le nom d'utilisateur
				$('.username').fadeOut(animationSpeed, function() {
					$(this).remove();
				})
				//On supprime le lien vers l'admin
				$('.linkToAdmin').fadeOut(animationSpeed, function() {
					$(this).remove();
				})
			}
		})

		


	})

});