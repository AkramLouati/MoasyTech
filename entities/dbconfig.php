<?php
class Database
{   
   
   public function connexion()
	{
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="wapi";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      
		return $conn;
	}
}
?>