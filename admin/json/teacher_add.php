<?php
include "../inc/config.php";
$action=$_POST['action'];
$id=$_POST['id'];
$name=$_POST['name'];
$headimg=$_POST['headimg'];
$introduction=$_POST['introduction'];

if($action!='del'){
	if(empty($name)) json(1,'请填写讲师姓名');
	if(empty($headimg)) json(1,'请上传讲师照片');
	if(empty($introduction)) json(1,'请填写讲师简介');
	}

if($action=='add'){
	$sql="insert into it_user_teacher(name, headimg, introduction, addtime)values('$name', '$headimg', '$introduction', NOW())";
	mysql_query($sql);
	json(0,'添加成功');
}elseif($action=='edit'){
	$sql="update it_user_teacher set name='$name', headimg='$headimg', introduction='$introduction' where id='$id'";
	mysql_query($sql);
	json(0,'编辑成功');
}elseif($action=='del'){
	$sql="delete from it_user_teacher where id='$id'";
	mysql_query($sql);
	json(0,'删除成功');
}
mysql_close();
?>