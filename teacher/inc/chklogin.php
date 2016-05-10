<?php
session_start();
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
if(empty($userid)){
	header("Location: ../login.php");
	}
?>