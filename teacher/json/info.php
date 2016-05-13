<?php
include_once("../inc/config.php");
include_once("../inc/chklogin.php");

$action=$_POST['action'];
$name=$_POST['name'];
$img=$_POST['img'];
$description=$_POST['description'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$qq=$_POST['qq'];
$pass = md5($_POST['pass']);
$username = $_POST['uid'];
$pass_old = $_POST['pass_old'];

if($action=='save'){
	$sql="insert into it_user_teacher(uid,name,headimg,introduction,phone,qq,email,addtime)values('$userid','$name','$img','$description','$phone','$qq','$email',NOW()) ON DUPLICATE KEY UPDATE  name='$name', phone='$phone',headimg='$img',introduction='$description',phone='$phone',qq='$qq',email='$email'";

$rs=$db->query($sql);
}elseif($action=='modify') {
	$sql ="SELECT password FROM it_user WHERE username = '$username'";
	$res_1 = $db->query($sql);
	$resultPaw = $res_1->fetch(PDO::FETCH_ASSOC);
	if($resultPaw['password']==md5($pass_old)){
		$sql_1 = "UPDATE it_user SET password ='$pass' WHERE username = '$username'";
		$res = $db->query($sql_1);
		if($res){
			json(0,"修改成功");
		}else{
			json(1,"修改失败");
		}
	}else{
		json(1,'原密码不正确！');
	}
}


?>
