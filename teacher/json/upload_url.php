<?php
	include '../inc/pdo.php';
	$title = $_POST['title'];
	$url_video   = $_POST['url_video'];
	$cid   = $_POST['cid'];
	$sql_video = "INSERT INTO it_course_video (course_id,title,url,addtime) VALUES ('$cid','$title','$url_video',NOW())";
	$stmt_course = $db_pdo->exec($sql_video);
	if($db_pdo->lastInsertId()){
		json(0,"添加成功");
	}
?>