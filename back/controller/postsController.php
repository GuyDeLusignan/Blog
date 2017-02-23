<?php
//CONSTANTS
include $_SERVER['DOCUMENT_ROOT'] . '/blog/core/model/constants.php';

//Autoload des class à utiliser 
spl_autoload_register(function ($class_name) {

	set_error_handler(function (){}, E_WARNING);
	include MODEL_CORE . '/core.class.php';
	include MODEL_BACK . '/' . $class_name . '.class.php';
	include MODEL_CORE . '/' . $class_name . ".class.php";
	restore_error_handler();

});
//Supprimer un Post si il ya une requete POST contenant un id DELETE
if (isset($_POST['idDelete'])) {

	$class = new deleteArticle();
	$class->deleteArticle($_POST['idDelete']);

//Edition de l'article
} else if(isset($_POST['idEdit'], $_POST['title'], $_POST['body'], $_POST['author'])) {
	$class = new editArticle();
	$class->editArticle($_POST['idEdit'], $_POST['title'], $_POST['body'], $_POST['author']);

//Poster un article
} else if (isset($_POST['title'], $_POST['body'], $_POST['author'])) {
	
	$class = new postArticle();
	$class->postArticle($_POST['title'], $_POST['body'], $_POST['author']);

//Article à éditer
} else if (isset($_POST['idArticleToEdit'])) {
	//Return JSON string to js
	$class = new getArticles();
	$class->getOneArticle($_POST['idArticleToEdit']);

} else {
	//Stocker les articles dans une variable
	$articlesClass = new getArticles();
	$articles = $articlesClass->getArticles();
}
