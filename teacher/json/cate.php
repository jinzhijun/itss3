<?php
include_once("../inc/config.php");
$arr=array();
$i=0;
$rs=$db->query("select id,name,parentid,depth from it_course_category order by id asc");
while($row=$rs->fetch(PDO::FETCH_ASSOC)){
	$arr[$i]=$row;
	$i++;
	}
echo json_encode(array("d"=>$arr));
?>