<?php
include '../inc/config.php';
include '../inc/chk_json.php';
$action=$_POST['action'];
$parentid=$_POST['parentid'];
$name=$_POST['name'];

if($action=='add'){
	$sql="insert into it_course_category(parentid,name)values('$parentid','$name')";
	mysql_query($sql);
	}

json(0,"操作成功");
mysql_close();

?>