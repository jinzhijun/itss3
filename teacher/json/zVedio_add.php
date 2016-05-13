<?php
include_once("../inc/config.php");

$teacher_id=$_POST['teacher_id'];
$cateid=$_POST['cateid'];
$title=$_POST['title'];
$img=$_POST['img'];
$description=$_POST['description'];
$price=$_POST['price'];
$service=$_POST['service'];
$content=$_POST['content'];
$genre=1;

$rs=$db->query("insert into it_course(teacher_id, cateid, title, img, description, price, service, content, genre, addtime)values('$teacher_id' ,'$cateid', '$title', '$img', '$description', '$price', '$service', '$content', '$genre', NOW())");


?>