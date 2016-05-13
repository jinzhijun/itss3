<?php
include "../inc/pdo.php";

$action=$_POST['action'];
$name=$_POST['name'];
$description=$_POST['description'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$qq=$_POST['qq'];
$userid = $_POST['userid'];

if($action == 'register'){
	$sql = "INSERT INTO it_user_teacher(uid,name,introduction,phone,qq,email,addtime) VALUES ('$userid','$name','$description','$phone','$qq','$email',NOW()) ON DUPLICATE KEY UPDATE  name='$name', phone='$phone',introduction='$description',phone='$phone',qq='$qq',email='$email'";
	$res = $db_pdo->exec($sql);
	if($res){
		json(0,'审核信息已发出');
	}
}
?>