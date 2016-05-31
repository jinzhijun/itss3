<?php
include_once("../inc/config.php");
include_once("../inc/chklogin.php");

$teacher_id=$userid;
$cateid=$_POST['cateid'];
$title=$_POST['title'];
$img=$_POST['img'];
$description=$_POST['description'];
$price=$_POST['price'];
$service=$_POST['service'];
$content=$_POST['content'];
$action = $_POST['action'];
$cid = $_POST['cid'];

if($action == 'zvideo'){
	$genre = 1;
	$rs=$db->exec("INSERT INTO it_course(teacher_id, cateid, title, img, description, price, service, content, genre, addtime) VALUES ('$teacher_id' ,'$cateid', '$title', '$img', '$description', '$price', '$service', '$content', '$genre', NOW())");
	if($db->lastInsertId()){
		json(0,'直播信息添加成功');
	}

}elseif($action == 'video'){
	$genre = 0;
	$stmt = $db->exec("INSERT INTO it_course(teacher_id, cateid, title, img, description, price, service, content, genre, addtime) VALUES ('$teacher_id' ,'$cateid', '$title', '$img', '$description', '$price', '$service', '$content', '$genre', NOW())");
	if($db->lastInsertId()){
		json(0,'点播信息添加成功');
	}

}elseif ($action == 'edit') {
	$sql = "UPDATE it_course SET title='$title',description='$description',price='$price',service='$service',content='$content',isShow='0',img='$img' WHERE id = '$cid'";
	$stmt = $db->query($sql);
	if($stmt){
		json(0,$sql);
	}
}

?>