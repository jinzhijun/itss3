<?php
include '../inc/config.php';
session_start();
$username=$_POST['username'];
$password=md5($_POST['password']);

$sql="select id,username,nickname,headimgurl,classify from it_user where username='$username' and password='$password'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$_SESSION['userid']=$row[0];
	$_SESSION['username']=$row[1];
	$_SESSION['nickname']=$row[2];
	$_SESSION['headimgurl']=$row[3];
	$_SESSION['classify']=$row[4];
	json(0,$row[4]);
}else{
	json(1,"账号或密码错误");
	}
mysql_close();

?>