<?php
include "../inc/config.php";
$action=$_POST['action'];
$id=$_POST['id'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$headimg=$_POST['headimg'];
$introduction=$_POST['introduction'];
$uid=$_POST['uid'];
$passw=$_POST['passw'];

if($action=='add'){
	// $sql_2 = "SELECT count(*) FROM it_user WHERE username = $phone";
	// $rs=mysql_query($sql_2);
	// $row=mysql_fetch_array($rs);
	// if($row[0]>0){
	// json(1,'用户已存在');
	// exit;
	// }
	$sql_i = "INSERT INTO it_user (username,password,classify,addtime) VALUES ('$phone',md5('$passw'),'1',NOW()) ON DUPLICATE KEY UPDATE username='$phone',password=md5('$passw'),classify='1',addtime=NOW()";
	mysql_query($sql_i);
	$num = mysql_insert_id();
	$sql="INSERT INTO it_user_teacher(name,uid, headimg,phone,introduction, addtime)values('$name','$num','$headimg','$phone','$introduction', NOW())";
	mysql_query($sql);
	json(0,'创建成功');
}elseif($action=='edit'){
	$sql="UPDATE it_user_teacher set name='$name',phone='$phone', headimg='$headimg', introduction='$introduction' where id='$id'";
	mysql_query($sql);
	json(0,'编辑成功');
}elseif($action=='del'){
	$sql="DELETE from it_user_teacher where id='$id'";
	mysql_query($sql);
	$sql_1 = "UPDATE it_user SET classify='0' WHERE id='$uid'";
	mysql_query($sql_1);
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