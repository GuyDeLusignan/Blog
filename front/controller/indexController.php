<?php 

spl_autoload_register(function ($class_name) {

	include MODEL_CORE . '/core.class.php';
	include MODEL_CORE . '/' . $class_name . '.class.php';

});

//Put articles in a variable
$class = new getArticles();
$articles = $class->getArticles();