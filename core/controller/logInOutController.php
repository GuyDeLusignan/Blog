<?php 
session_start();
//Si il n'y a pas d'état (connecté ou non) alors on passe l'état à déconnecté
if(!isset($_SESSION['state'])) {
	$_SESSION['state'] = 'notConnected';
}

if (isset($_POST['pseudo'], $_POST['password'])) {
	include '../model/core.class.php';
	include '../model/login.class.php';
	$class = new login();
	$class->logUser($_POST['pseudo'], $_POST['password']);

//Si on envoie deconnexion on détruit et on recré une session
} elseif (isset($_POST['deconnexion'])) {
	echo 'disconnected';
	session_destroy();
	session_start();
}