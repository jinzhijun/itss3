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
$userid = $_POST['userid'];
$u_name = $_POST['u_name'];
$account = $_POST['account'];

if($action=='save'){
	$sql="INSERT into it_user_teacher(uid,name,headimg,introduction,phone,qq,email,addtime)values('$userid','$name','$img','$description','$phone','$qq','$email',NOW()) ON DUPLICATE KEY UPDATE  name='$name', phone='$phone',headimg='$img',introduction='$description',phone='$phone',qq='$qq',email='$email'";

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
}elseif ($action =='alipay') {
	$userid=$_SESSION['userid'];
	$sql_alipay = "INSERT INTO it_user_alipay (uid,name,alipay,addtime) VALUES ('$userid','$u_name','$account',NOW()) ON DUPLICATE KEY UPDATE uid='$userid',name='$u_name',alipay='$account',addtime=NOW()";
	$stmt_alipay = $db->query($sql_alipay);
	if ($stmt_alipay) {
		json(0,'支付宝账户更新成功');
	}
}


?>
