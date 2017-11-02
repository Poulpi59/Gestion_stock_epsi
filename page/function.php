<?php
	function mysql_connect($adr, $user, $mdp, $bdd){
		$mysqli = new mysqli("$adr", $user, $mdp, $bdd);
		return $mysqli;
	}

	function mysql_query($mysqli, $query){
		$res = $mysqli->query($query);
		return $res;
	}

	function create_bdd($mysqli)
	{
		$mysqli->query("CREATE DATABASE epsi_stock");
		$mysqli = @mysql_connect("127.0.0.1", "root", "","epsi_stock");

		$mysqli->query("	CREATE TABLE utilisateurs (
											id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
											login VARCHAR(30) NOT NULL,
											mot_de_passe VARCHAR(30) NOT NULL) ENGINE=InnoDB");

		$mysqli->query("	INSERT INTO utilisateurs (login, mot_de_passe)
											VALUES ('admin', 'admin')");

		$mysqli->close();
	}

	function logged(){
		session_start();
	    if ($_SESSION["user"] != true) {
	        header("location: login.php");
	    }
	}
?>
