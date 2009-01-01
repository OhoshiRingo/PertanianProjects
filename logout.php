<?php
	error_reporting(0);
	ob_start();
	session_start();
	include "connect.php";
	if(!$_SESSION["log"]|| !$_SESSION["user"]){
		echo $_SESSION["log"]."</br>";
		echo $_SESSION["user"]."</br>";
	}else{
		unset($_SESSION["log"]);
		unset($_SESSION["username"]);
		unset($_SESSION["user"]);
		unset($_SESSION["admin_id"]);
		unset($_SESSION["mitra_id"]);
	
		echo "Logout Success";
		ob_end_flush();
		session_destroy();

	}



	ob_end_flush();
	mysqli_close($cons);

?>