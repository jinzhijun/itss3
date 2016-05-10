<?php
include "../inc/config.php";
$keyword=$_POST['keyword'];
$arr=array();
$i=0;
$sql="select * from it_user_teacher where name like '%$keyword%' limit 0,10";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$arr[$i]=$row;
	$i++;
}
echo json_encode(array("d"=>$arr));
mysql_close();
?>