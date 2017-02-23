<?php 
include "../core/controller/logInOutController.php";
include "controller/loginAdminController.php";
include "controller/postsController.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Posts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo CSS . '/fontello.css' ?>">
	<link rel="stylesheet" href="<?php echo CSS . '/styles.css' ?>">
	<link rel="stylesheet" href="<?php echo CSS . '/tooltipster.bundle.min.css' ?>" />
	<link rel="stylesheet" href="<?php echo CSS . '/tooltipster-sideTip-shadow.min.css' ?>" />

</head>
<body>

	<?php include CORE . '/nav.php'; ?>

	<!-- LISTER LES ARTICLES -->
	<div id="bodyPosts">
		<div class="container">
			<div class="row">

				<ul class="col-sm-12 nav nav-pills">
					<li class="active"><a data-toggle="pill" href="#ajouterPill">Ajouter</a></li>
					<li><a href="#editerPill" data-toggle="pill" style="display: none;">Edition</a></li>
				</ul>

				<div class="tab-content">
					<div id="ajouterPill" class="col-xs-12 col-sm-12 tab-pane fade in active">
						<!-- FORM AJOUT D'UN ARTICLE -->
						<form id="formPostArticle" action="" method="POST">
							<div class="form-group">
								<div class="state">Ajouter un article :</div>
								<label for="title">Titre</label>
								<input type="text" class="form-control" id="title" name="title" required>

								<label for="body">Contenu</label>
								<textarea name="body" id="body" class="form-control" rows="4" required></textarea>

								<label for="body">Auteur</label>
								<input type="text" class="form-control" id="author" name="author" required>
							</div>
							<button type="submit" class="buttonFormPost btn btn-primary">Envoyer</button>
						</form>
					</div>

					<div id="editerPill" class="col-xs-12 col-sm-12 tab-pane fade in">
						<!-- FORM AJOUT D'UN ARTICLE -->
						<form class="formEditArticle" action="" method="POST">
							<div class="form-group">
								<div class="state">Editer un article :</div>
								<label for="title">Titre</label>
								<input type="text" class="form-control" id="titleEdit" name="title" required>

								<label for="body">Contenu</label>
								<textarea name="body" class="form-control" id="bodyEdit" rows="4" required></textarea>

								<label for="body">Auteur</label>
								<input type="text" class="form-control" id="authorEdit" name="author" required>
							</div>
							<button type="submit" class="buttonFormEdit btn btn-primary">Envoyer</button>
							<button class="buttonAnnuler btn btn-danger">Annuler Edition</button>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div style="color: black; background: white;"></div>
					<div class="table-header row">
						<div class="col-sm-5">Titre</div>
						<div class="col-sm-3">Auteur</div>
						<div class="col-sm-3">Date de Création</div>
						<div class="col-sm-1">Actions</div>
					</div>
					<div class="wrapper-table-line">
						<?php foreach ($articles as $article) { ?>
						<div class="table-line row">
							<div class="col-sm-5 table-cell titre"><?php echo $article['titre'] ?></div>
							<div class="col-sm-3 table-cell auteur"><?php echo $article['auteur'] ?></div>
							<div class="col-sm-3 table-cell date"><?php echo $articlesClass->dateCreation($article['date_creation']) ?></div>
							<div class="col-sm-1 table-cell" id="<?php echo $article['id'] ?>">

								<i class="icon-trash-empty posts-tooltip" data-tooltip-content="#tooltip_content"> </i>
								<i class="icon-pencil" id="editArticle"> </i>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="table-header table-footer row">
						<div class="col-sm-5">Titre</div>
						<div class="col-sm-3">Auteur</div>
						<div class="col-sm-3">Date de Création</div>
						<div class="col-sm-1">Actions</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="tooltip_templates" style="display: none;">
	    <span id="tooltip_content">
	        <strong>Confirmez</strong>
	    </span>
	</div>

	<div class="popup">
		<span class="debug-titre">DEBUG :</span>
		<span class="debug-body"></span>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="<?php echo JS_CORE . '/tooltipster.bundle.min.js' ?>"></script>
	<script src="../core/js/logInOut.js"></script>
	<script src="js/postArticle.js"></script>
	<script src="js/deleteArticle.js"></script>
	<script src="js/editArticle.js"></script>
</body>
</html>