<?php

ob_start();
session_start();

$log = array();
$log["status"] = array();
include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$role = $_POST["role"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	$query = "select * from ".$role." where username='".$username."' and password='".$password."'";
	$sql = mysqli_query($cons, $query);
	if($sql){
		$row = mysqli_fetch_assoc($sql);
		if($username === $row["username"] && $password === $row["password"]){
			$res["status"] = "success";
			$res["login"] = "success";
			$res["session"] = $row["id"];
			$res["user"] = $row["admin_id"];
			$res["role"] = $row["log"];
			array_push($log["status"],$res);
			echo json_encode($log);
		}else{
			$res["status"] = "Login Error";
			array_push($log["status"],$res);
			echo json_encode($log);
		}
		mysqli_close($cons);
	}
}

ob_end_flush();

?>