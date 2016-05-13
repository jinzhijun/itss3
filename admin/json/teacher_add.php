<?php
include "../inc/config.php";
$action=$_POST['action'];
$id=$_POST['id'];
$name=$_POST['name'];
$headimg=$_POST['headimg'];
$introduction=$_POST['introduction'];
$uid=$_POST['uid'];

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
}elseif ($action=='agree') {
	$sql = "UPDATE it_user SET classify='1' WHERE id = '$uid'";
	mysql_query($sql);
	json(0,'同意');
}elseif ($action=='N_agree') {
	$sql = "UPDATE it_user SET classify='0' WHERE id = '$uid'";
	mysql_query($sql);
	json(0,'不同意');
}

mysql_close();
?>