<?php 
/**
* 
*/
class editArticle extends core
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function editArticle($id, $titre, $body, $auteur)
	{

		$editArticle = $this->conn->prepare("UPDATE article SET titre = :titre, body = :body, auteur = :auteur  WHERE id = :id ");
		$editArticle->bindValue(':titre', $titre, PDO::PARAM_STR);
		$editArticle->bindValue(':body', $body, PDO::PARAM_STR);
		$editArticle->bindValue(':auteur', $auteur, PDO::PARAM_STR);
		$editArticle->bindParam(':id', $id, PDO::PARAM_INT);
		$editArticle->execute();
		$this->conn = null;
		echo 'edited';
	}
}

