<?php
include "../inc/config.php";

$arr=array();
$i=0;
$sql="select * from it_course_category order by sort,depth asc,id asc";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$arr[$i]=$row;
	$i++;
}
echo json_encode(array("d"=>$arr));
?>