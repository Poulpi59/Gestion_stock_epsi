<?php
	function logged(){
		session_start();
	    if ($_SESSION["user"] != true) {
	        header("location: login.php");
	    }
	}
?>
