<?php
//Check si l'utr est propre sinon renvoi sur l'utl propre
if(preg_match('/[a-z\/]+article\.php\?id=[0-9]+&title=[a-z-]+$/', $_SERVER['REQUEST_URI'])) {
	header("Status: 301 Moved Permanently", false, 301);
	header("Location: ". $_SERVER['HTTP_HOST'] ."blog/front/article/" . $_GET['title'] . '-' . $_GET['id']);
	exit();
}

//Autoload des class
spl_autoload_register(function ($class_name) {
	include MODEL_CORE . '/core.class.php';
	include MODEL_CORE . '/' . $class_name . ".class.php";
});

//Stock l'article dans une variable
$articleClass = new getArticles();
$article = $articleClass->getOneArticle($_GET['id'], false)[0];