<?php
session_start();
$adminID=$_SESSION["adminID"];
$adminName=$_SESSION["adminName"];
$name=$_SESSION["name"];

if(empty($adminID)){
	header("Location: login.php");
	exit;
	}
?>