<?php
include '../inc/config.php';
include '../inc/user_info.php';
if(empty($userid)) exit;

$courseid=$_POST['courseid'];
$arr=array();
$i=0;
$sql="select * from it_course_video where course_id='$courseid' order by id asc";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$arr[$i]=$row;
	$i++;
}
echo json_encode(array("d"=>$arr));
mysql_close();

?>