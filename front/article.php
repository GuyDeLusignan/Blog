<?php
include $_SERVER['DOCUMENT_ROOT'] . '/blog/core/model/constants.php';
include CONTROLLER_CORE . '/logInOutController.php';	//core
include CONTROLLER_FRONT . '/articleController.php';	//fronts
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blog Cogan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo CSS ?>/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body id="accueil">

	<div class="container">
		<div class="row wrapperHeader">
			<div class="col-sm-12 headerImg">
			</div>
		</div>
		<div class="row">
			<?php include CORE . '/nav.php'; ?>
		</div>
		<div class="row">
			<div class="col-sm-12 container-single-article">
				<h4 class="single-article-title"><?php echo $article['titre'] ?></h4>
				<p>
					<?php echo $article['body'] ?>
				</p>
				<span> <?php echo 'De ' . $article['auteur'] . ',' ; ?> </span>
				<span> <?php $core = new core(); echo 'le ' . $core->dateCreation($article['date_creation']); ?> </span>
			</div>

		</div>
	</div>
	
Chapitre abstrait 3 du conpendium : le savoir de l'orthodoxisation sert à établir le point adjacent dans ces prestances, bonnes fêtes. Imbiber, porter le colloque autour de la Géo Physique Spatiale est censé(e) imposer les grabuses lastiques vers Lovanium, c’est clair. Quand on parle de relaxation, l'activisme autour de la Géo Physique Spatiale oblige à se baser sur les quatre carrés fous du fromage vers le monde entier, Bonne Année.

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="<?php echo JS_CORE ?>/logInOut.js"></script>
	<script>

		$('.dropdown').on('show.bs.dropdown', function() {
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(100);
		});

		$('.dropdown').on('hide.bs.dropdown', function() {
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(100);
		});

	</script>
</body>
</html>