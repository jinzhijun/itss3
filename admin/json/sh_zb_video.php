<?php
	include "../inc/config.php";
	try {
	$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
}
	$courserid = $_POST['courseid'];
	$b_time = $_POST['b_time'];
	$e_time = $_POST['e_time'];
	$assistantToken = $_POST['assistantToken'];
	$webid = $_POST['webid'];
	$number = $_POST['number'];
	$studentClientToken = $_POST['studentClientToken'];
	$studentJoinUrl = $_POST['studentJoinUrl'];
	$teacherJoinUrl = $_POST['teacherJoinUrl'];
	$teacherToken = $_POST['teacherToken'];
	// var_dump($_POST);
	if(!isset($b_time)){
		json(1,"开始时间不能为空");
	}
	if(!isset($e_time)){
		json(1,"结束时间不能为空");
	}

	$sql ="INSERT INTO it_course_video_time (courserid,b_time,e_time,assistantToken,webid,webnum,studentToken,studentUrl,teacherToken,teacherUrl) VALUES
	 (:courserid,:b_time,:e_time,:assistantToken,:webid,:webnum,:studentToken,:studentUrl,:teacherToken,:teacherUrl)";
	$stmt = $db_pdo->prepare($sql);
	$stmt->bindParam(":courserid",$courserid);
	$stmt->bindParam(":b_time",$b_time);
	$stmt->bindParam(":e_time",$e_time);
	$stmt->bindParam(":assistantToken",$assistantToken);
	$stmt->bindParam(":webid",$webid);
	$stmt->bindParam(":webnum",$number);
	$stmt->bindParam(":studentToken",$studentClientToken);
	$stmt->bindParam(":studentUrl",$studentJoinUrl);
	$stmt->bindParam(":teacherToken",$teacherToken);
	$stmt->bindParam(":teacherUrl",$teacherJoinUrl);

	$stmt->execute();
	$lastId = $db_pdo->lastInsertId();

	$sql_1 ="UPDATE it_course SET isShow = :isShow WHERE id = :cid";
	$stmt_1 = $db_pdo->prepare($sql_1);
	$isShow = 1;
	$cid = $courserid;
	$stmt_1->bindParam(":isShow",$isShow);
	$stmt_1->bindParam(":cid",$cid);
	$stmt_1->execute();
	$row = $stmt_1->rowCount();
	if ($lastId AND $row) {
		json(0,"审核成功");
	}else{
		json(1,"fail");
	}
?>
