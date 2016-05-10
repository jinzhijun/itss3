<?php
include '../inc/config.php';
require_once('../inc/cart.class.php');
$cart = new CartAPI();
session_start();
$userid=$_SESSION['userid'];
$courseid=$_POST['courseid'];

if(empty($userid)) json(1,'请登录会员账号');

$sql="select id,title,price,img from it_course where id='$courseid' and isShow='1'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$title=$row[1];
	$price=$row[2];
	$img=$row[3];
	}else{
		json(1,'该课程已下线');
		}

//判断用户是否已经购买此课程
$sql="select count(*) from it_user_study where userid='$userid' and courseid='$courseid'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
$isBuy=$row[0];

if($isBuy>0) json(3,'已经购买过');
if($price==0){
	$sql="insert into it_user_study(userid,courseid,addtime)values('$userid','$courseid',NOW())";
	mysql_query($sql);
	json(3,'购买免费课程');
}else{
	$cart->addCart($courseid, $img, $title, $price, 1);
	json(2,'跳转到购物车');
	}

mysql_close();
?>