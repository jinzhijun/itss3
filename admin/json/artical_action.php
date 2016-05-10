<?php
include "../inc/config.php";
$action=$_POST['action'];
$id=$_POST['id'];
$cateid=$_POST['cateid'];
$title=$_POST['title'];
$content=$_POST['content'];
$url=$_POST['url'];

if($action=='add'){
	$sql="insert into it_artical(cateid,title,content,url,addtime)values('$cateid','$title','$content','$url',Now())";
	mysql_query($sql);
}elseif($action=='del'){
	$sql="delete from it_artical where id='$id'";
	mysql_query($sql);
}

	
json(0,"操作成功");
mysql_close();
?>