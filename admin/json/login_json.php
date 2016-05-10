<?php
include "../inc/config.php";
session_start();
$adminname=$_POST['username'];
$password=md5($_POST['password']);

$sql="select id,username,name from it_admin where username='$adminname' and password='$password'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$_SESSION['adminID']=$row[0];
	$_SESSION['adminName']=$row[1];
	$_SESSION['name']=$row[2];
	json(0,"登录成功");
}else{
	json(1,"账号或密码错误");
	}
mysql_close();

?>