<?php
include '../inc/config.php';
include "../inc/user_info.php";
require_once('../inc/cart.class.php');
$cart = new CartAPI();
$count=$cart->CountPrice();
$price=$count[0];
$courseid=$_POST['courseid'];
$id=explode(',',$courseid);
$orderid=build_order_no(); 

for($i=0; $i<count($id); $i++){
	$sql="select * from it_course where id='$id[$i]'";
	$rs=mysql_query($sql);
	$row=mysql_fetch_array($rs);
	if($row){
		$teacherid=$row['teacher_id'];
		$title=$row['title'];
		$sprice=$row['price'];
		$buy="insert into it_order_item(orderid,course_id,teacher_id,title,price,addtime)values('$orderid','$id[$i]','$teacherid','$title','$sprice',NOW())";
		mysql_query($buy);
		}
	}
$buy="insert into it_order(userid,orderid,price,addtime)values('$userid','$orderid','$price',NOW())";
mysql_query($buy);
mysql_close();

echo $orderid;

function build_order_no(){
	return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
	}
?>