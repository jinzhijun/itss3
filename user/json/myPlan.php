<?php
include "../../inc/config.php";
include "../../inc/user_info.php";
$arr=array();
$i=0;

$sql="select it_course.id, it_course.img, it_course.title, it_user_teacher.name, it_user_plan.percent
	from it_user_plan
	left join it_course on it_course.id=it_user_plan.courseid
	left join it_user_teacher on it_user_teacher.id=it_course.teacher_id
	where it_user_plan.userid='$userid'
	order by it_user_plan.id desc
	";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$arr[$i]=$row;
	$i++;
}
echo json_encode(array("d"=>$arr));
mysql_close();
?>