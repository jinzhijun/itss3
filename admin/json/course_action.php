<?php
include "../inc/config.php";
$action=$_POST['action'];
$cateid=$_POST['cateid'];
$title=$_POST['title'];
$description=$_POST['description'];
$teacher_id=$_POST['teacher_id'];
$img=$_POST['img'];
$price=$_POST['price'];
$service=$_POST['service'];
$content=$_POST['content'];
$genre=$_POST['genre'];
$courserid = $_POST['courserid'];
$b_time = $_POST['b_time'];
$e_time = $_POST['e_time'];
// $assistantToken = $_POST['assistantToken'];
// $webid = $_POST['webid'];
// $webnum = $_POST['webnum'];
// $studentToken = $_POST['studentToken'];
// $studentUrl = $_POST['studentUrl'];
// $teacherToken = $_POST['teacherToken'];
// $teacherUrl = $_POST['teacherUrl'];


if($action=='add'){
	$sql="insert into it_course(cateid,title,description,teacher_id,img,price,service,content,genre,addtime)values('$cateid','$title','$description','$teacher_id','$img','$price','$service','$content','$genre',Now())";
	mysql_query($sql);
	// $sql_1 = "INSERT INTO it_course_video_time (courserid,b_time,e_time,assistantToken,webid,webnum,studentToken,studentUrl,teacherToken,teacherUrl) VALUES (:courserid,:b_time,:e_time,:assistantToken,:webid,:webnum,:studentToken,:studentUrl,:teacherToken,:teacherUrl)";
	// $stmt = $db_pdo->prepare($sql_1);
	// $stmt->bindParam(":courserid",$courserid);
	// $stmt->bindParam(":b_time",$b_time);
	// $stmt->bindParam(":e_time",$e_time);
	// $stmt->bindParam(":assistantToken",$assistantToken);
	// $stmt->bindParam(":webid",$webid);
	// $stmt->bindParam(":webnum",$webnum);
	// $stmt->bindParam(":studentToken",$studentToken);
	// $stmt->bindParam(":studentUrl",$studentUrl);
	// $stmt->bindParam(":teacherToken",$teacherToken);
	// $stmt->bindParam(":teacherUrl",$teacherUrl);
	// $stmt->execute();
	// if ($stmt->rowCount()) {
	// 	json(0,"suesscc");
	// }else{
	// 	json(1,"faild");
	// }
	}

	 
json(0,"操作成功");
mysql_close();
?>