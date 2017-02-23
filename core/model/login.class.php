<?php
/**
* 
*/
class login extends core
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function logUser($pseudo, $password)
	{
		$password = sha1($password);
		$log = $this->conn->prepare("SELECT pseudo, password FROM utilisateur WHERE pseudo = :pseudo AND password = :password");
		$log->execute(array(
			':pseudo' => $pseudo,
			':password' => $password
		));
		if($log->fetchAll()) {
			echo 'connected';
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['password'] = $password;
			$_SESSION['state'] = 'connected';
		} else {
			$_SESSION['state'] = 'wrongPassOrUsername';
			echo $_SESSION['state'];
		}
		$this->conn = null;
	}
}