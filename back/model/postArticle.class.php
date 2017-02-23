<?php
/**
* 
*/
class postArticle extends core
{
	
	function __construct()
	{
		parent::__construct();
	}

	function postArticle($title, $body, $author) {
		//Securisation
		$title = strip_tags($title);
		$body = strip_tags($body);
		$author = strip_tags($author);
		//Insertion des données dans la BDD
		$postArticle = $this->conn->prepare("INSERT INTO article (titre, body, auteur, date_creation) VALUES (:title, :body, :author, NOW())");
		$postArticle->execute(array(
			':title' => $title,
			':body' => $body,
			':author' => $author
		));
		
		//Creation de la date à retourné
		$returnDate = date("d ") . $this->numberMonthToStringFR(date("m")) . date(" Y");
		//Get id de l'article
		$postArticle = $this->conn->prepare("SELECT id FROM article ORDER BY id DESC LIMIT 1 ");
		$postArticle->execute();
		//Convertion en JSON des données à retourné
		$returnArray = json_encode(array('dateCreation' => $returnDate, 'idArticle' => $postArticle->fetch()[0]));
		$conn = null;
		echo $response = $returnArray;
	}
}