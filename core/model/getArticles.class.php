<?php 
/**
* 
*/

class getArticles extends core
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getArticles() {
		$getArticles = $this->conn->prepare("SELECT id, titre, body, auteur, date_creation FROM article");
		$getArticles->execute();
		$results = $getArticles->fetchAll();
		$conn = null;
		return $results;
	}

	public function getOneArticle($id, $json = 1)
	{
		$getArticle = $this->conn->prepare("SELECT id, titre, body, auteur, date_creation FROM article WHERE id = :id");
		$getArticle->execute(array(':id' => $id));
		$results = $getArticle->fetchAll();
		$conn = null;
		if($json) {
			echo json_encode($results);
		} else {
			return $results;
		}
	}

}
