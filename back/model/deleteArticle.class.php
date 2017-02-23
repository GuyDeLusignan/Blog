<?php 
/**
* 
*/

class deleteArticle extends core
{
	
    function __construct()
	{
		parent::__construct();
	}

	public function deleteArticle($id)
    {
		$this->conn->exec("DELETE FROM article WHERE id =".$id."");
		$conn = null;
		echo "deleted";
    }

}