<?php
header("Content-type: text/html; charset=utf-8");
header("Access-Control-Allow-Origin:*"); 
header("Access-Control-Request-Method: GET, POST"); 
header("Cache-Control: no-cache");
header("Access-Control-Allow-Credentials:true");
header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Range, Origin");
header("Access-Control-Expose-Headers: Content-Range");
header("Access-Control-Max-Age: 3600");
//error_reporting(0); 

$conn =mysql_connect("localhost","itss","itss"); 
mysql_select_db("itss3");
mysql_query("SET NAMES utf8");

//友情链接
function links(){
	$sql="select * from it_link order by id desc";
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		echo '<li><a href="'.$row['link'].'" target="_blank">'.$row['title'].'</a></li> ';
		}
	}
//首页列表
function index_list($id){
	$sql="select pid from it_course_category where id='$id'";
	$row=mysql_fetch_array(mysql_query($sql));
	if($row){
		$pid=$row[0];
		}
	$i=1;
	$str='';
	$sql="select 
		it_course.id, 
		it_course.title, 
		it_course.img, 
		it_course.price, 
		it_user_teacher.name,
		(select count(*) from it_user_study where courseid=it_course.id) as bm,
		(select count(*) from it_course_video where course_id=it_course.id and url!='') as ks,
		it_user_teacher.name
		from it_course
		left join it_user_teacher on it_course.teacher_id=it_user_teacher.id
		where it_course.isShow=1 and it_course.genre=0
		and it_course.cateid in($pid)
		limit 4
		";
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		$price=$row['price'];
		if($price==0) $price="免费";
		$str.='<li>';
		$str.='<a href="details.php?id='.$row["id"].'">';
		$str.='<img src="'.$row["img"].'" width="100%" height="165">';
		$str.='<font>'.$row["title"].'</font>';
		$str.='<span><img src="images/user-icon.png">'.$row['bm'].'人学习 <img src="images/timer-icon.png" style="margin-left:10px;">'.$row['ks'].'课时</span>';
		$str.='<p>'.$row["name"].' <i>'.$row["price"].'</i></p>';
		$str.='</a>';
		$str.='</li> '; 
		$i++;
		}
	for($i;$i<=4;$i++){
		$str.='<li class="no"></li>';
		}
	echo $str;
	}

function json($success,$msg){
	$arr = array(
		'success'=>$success,
		'msg'=>$msg
		);
	echo json_encode($arr);
	exit;
	}
?>