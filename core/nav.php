<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo 'http://' . FRONT_URL . '/index.php' ?>">Blog</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<!-- Affichage de l'onglet admin si on est connecté -->


			<ul class="nav navbar-nav navbar-left">
				<?php if($_SESSION['state'] === 'connected') : ?>
					<li class="active linkToAdmin"><a href="<?php echo 'http://' . BACK_URL . '/posts.php' ?>">Admin</a></li>
				<?php endif; ?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- Debut affichage connexion/deconnexion -->
				<?php 
				if($_SESSION['state'] !== 'connected') : ?>

				<li> <a href="#" class="username"></a></li>

				<li class="dropdown containerLog">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"> </span> Connexion
						<span class="caret"></span></a>
						<div class="dropdown-menu">
							<form action="" class="formLogin">
								<label for="pseudo">Pseudo :</label>
								<input type="text" name="pseudo" required id="pseudo">
								<label for="password">Mot de passe :</label>
								<input type="text" name="password" required id="password">
								<button type="submit" class="btn btn-primary">Envoyer</button>
							</form>
						</div>
					</li>

				<?php else : ?>

					<li> <a href="#" class="username"><?php echo $_SESSION['pseudo']; ?> </a></li>
					<li class="containerLog">
						<a href="#" class="deconnexion"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a>
					</li>
				<?php endif; ?>
				<!-- Fin affichage connexion/deconnexion -->
			</ul>

		</div>
	</div>
</nav>