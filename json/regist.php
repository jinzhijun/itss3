<?php
include '../inc/config.php';
session_start();
$username=$_POST['username'];
$code=$_POST['code'];
$password=md5($_POST['password']);
$vcode=$_SESSION['vcode'];

if($code!=$vcode){
	json(1,'验证码错误');
}else{
	$sql="insert into it_user(username,password,addtime)values('$username','$password',NOW())";
	mysql_query($sql);
}

//自动登录
$sql="select id,username,nickname,headimgurl,classify from it_user where username='$username' and password='$password'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$_SESSION['userid']=$row[0];
	$_SESSION['username']=$row[1];
	$_SESSION['nickname']=$row[2];
	$_SESSION['headimgurl']=$row[3];
	$_SESSION['classify']=$row[4];
	json(0,"注册成功");
}
mysql_close();

?>