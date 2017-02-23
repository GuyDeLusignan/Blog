<?php

/**
* 
*/
class core
{	

	function __construct()
	{
		$this->conn = $this->conn();
	}

	public $conn;

	//Connection à la base de données
	public function conn()
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "blogCogan";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    // echo "Connected successfully";
		    return $conn;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
	}

	// Convertion des mois chiffres vers lettre
	public function numberMonthToStringFR($month) {
		$months = array(
			'01' => 'Janvier',
			'02' => 'Février',
			'03' => 'Mars',
			'04' => 'Avril',
			'05' => 'Mai',
			'06' => 'Juin',
			'07' => 'Juillet',
			'08' => 'Aout',
			'09' => 'Septembre',
			'10' => 'Novembre',
			'11' => 'Octobre',
			'11' => 'Décembre',
			'1' => 'Janvier',
			'2' => 'Février',
			'3' => 'Mars',
			'4' => 'Avril',
			'5' => 'Mai',
			'6' => 'Juin',
			'7' => 'Juillet',
			'8' => 'Aout', 
			'9' => 'Septembre',
		);
		return $months[$month];
	}

	//Fonction de création de la date en PHP depuis date SQL
	public function dateCreation($SQL_date) {
		//Conversion string to PHP Date
		$phpDate = strtotime($SQL_date);
		//Conversion (int) mois en (string) mois 
		$monthInt = date('m', $phpDate);
		$monthString = $this->numberMonthToStringFR($monthInt);
		//Décomposition de la Date => d = day, Y = year
		$phpDateDay = date('d', $phpDate);
		$phpDateYear = date('Y', $phpDate);
		//Assemblage de la date
		$conn = null;
		return $dateCreation = $phpDateDay . ' ' . $monthString . ' ' . $phpDateYear;
	}

}