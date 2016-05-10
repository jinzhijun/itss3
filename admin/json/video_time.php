<?php
include '../inc/config.php';
$courserid=$_POST['courserid'];
$b_time=$_POST['b_time'];
$e_time=$_POST['e_time'];

if(empty($courserid)) json(1,'请选择直播课程');
if(empty($b_time)) json(1,'请输入直播开始时间');
if(empty($e_time)) json(1,'请输入直播结束时间');

	//POST 
	function send_post($url,$postData)
	{
		$pData = http_build_query($postData);
		$options  = array(
							'http' => array(
								'method'=> "POST",
								'header'=> "Content-type:application/x-www-form-urlencoded",
								'content'=>$pData,
								'timeout'=>1*60
								)
						  );
		$context = stream_context_create($options);
		$result = file_get_contents($url,false,$context);

		return $result;
	}


$sql="select count(*) from it_course_video_time where courserid='$courserid'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
$count=$row[0];

if(empty($count)){
	// $sql="insert into it_course_video_time(courserid,b_time,e_time)values('$courserid','$b_time','$e_time')";
	// mysql_query($sql);

	$sql_1 = "SELECT  * FROM it_course_video WHERE course_id = :courserid";
	$stmt = $db_pdo->prepare($sql_1);
	$stmt->bindParam(':courserid',$courserid);
	$stmt->execute();
	$sec_Data = $stmt->fetchALL(PDO::FETCH_ASSOC); 
	// Request itss3 
	$postData = array(
		'loginName'=>'admin@itss3.com',
		'password'=>'888888',
		'sec'=>"",
		'subject'=> $sec_Data['title'],
		'startDate'=> $b_time,
		'invalidDate'=> $e_time
		);
	$resultData = send_post('http://itss3.gensee.com/integration/site/training/room/created',$postData);
	$res = json_decode($resultData,true);

	//INSERT DATA into it_course_video_time ;
	$sql_2 = "INSERT INTO it_course_video_time (courserid,b_time,e_time,assistantToken,webid,webnum,studentToken,studentUrl,teacherToken,teacherUrl) VALUES (:courserid,:b_time,:e_time,:assistantToken,:webid,:webnum,:studentToken,:studentUrl,:teacherToken,:teacherUrl)";
	$stmt_1 = $db_pdo->prepare($sql_2);
	$stmt_1->bindParam(":courserid",$courserid);
	$stmt_1->bindParam(":b_time",$b_time);
	$stmt_1->bindParam(":e_time",$e_time);
	$stmt_1->bindParam(":assistantToken",$res['assistantToken']);
	$stmt_1->bindParam(":webid",$res['id']);
	$stmt_1->bindParam(":webnum",$res['number']);
	$stmt_1->bindParam(":studentToken",$res['studentClientToken']);
	$stmt_1->bindParam(":studentUrl",$res['studentJoinUrl']);
	$stmt_1->bindParam(":teacherUrl",$res['teacherJoinUrl']);
	$stmt_1->bindParam(":teacherToken",$res['teacherToken']);
	$stmt_1->execute();
	if ($stmt_1->rowCount()) {
		json(0,"succsee");
	}else{
		json(1,"falid");
	}

}else{
	$sql="update it_course_video_time set b_time='$b_time', e_time='$e_time' where courserid='$courserid'";
	mysql_query($sql);

	// $postData = array(
	// 	'loginName'=>'admin@itss3.com',
	// 	'password'=>'888888',
	// 	'sec'=>"",
	// 	'subject'=>"classs32a",
	// 	'startDate'=>'2016-05-10 10:00:00',
	// 	'invalidDate'=>'2016-05-10 12:00:00'
	// 	);
	// $resultData = send_post('http://itss3.gensee.com/integration/site/training/room/created',$postData);
	// $res = json_decode($resultData,true);
}


json(0,"succsee112");
?>