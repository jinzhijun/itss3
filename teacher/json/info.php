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


$sql="insert into it_user_teacher(uid,name,headimg,introduction,phone,qq,email,addtime)values('$userid','$name','$img','$description','$phone','$qq','$email',NOW()) ON DUPLICATE KEY UPDATE  name='$name', phone='$phone',headimg='$img',introduction='$description',phone='$phone',qq='$qq',email='$email'";
$rs=$db->query($sql);


?>
