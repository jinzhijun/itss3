<?php
include "../../inc/config.php";
include "../../inc/user_info.php";
$arr=array();
$i=0;
$sql="select it_course.title,it_course.img,it_course.description,it_user_teacher.name,it_course.id,it_course.genre
	from it_user_study 
	left join it_course on it_course.id=it_user_study.courseid
	left join it_user_teacher on it_user_teacher.id=it_course.teacher_id
	where it_user_study.userid='$userid' order by it_user_study.id desc";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$arr[$i]=$row;
	$i++;
}
echo json_encode(array("d"=>$arr));
mysql_close();
?>