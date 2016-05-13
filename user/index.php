<?php
include "../inc/config.php";
include "../inc/user_info.php";
if(empty($userid)){
	header("location: ../login.php");
	}
$url = $_SERVER['PHP_SELF']; //获取当前页面名称 
$filename= substr( $url , strrpos($url , '/')+1 );
if($classify==1){
	header("location: /teacher/");
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台-学习中心</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.login.js" type="text/javascript"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var filename='<?php echo $filename?>';
$(function(){
	$('.leftMenu li').each(function() {
        var obj=$(this).find('a').attr('href');
		if(obj==filename) $(this).find('a').addClass('on')
		});
	
	study()
	});

function study(){
	$.ajax({
		url: "json/myStudy.php", 
		dataType:"json", 
		success: function(e){
			var data=e.d;
			var str='';
			for(var i=0; i<data.length; i++){
				var d=data[i];
				str=str+'<li>';
				str=str+'<img src="'+d.img+'">';
				str=str+'<p>';
				str=str+'<b>'+d.title+'</b>'+d.description;
				str=str+'<strong>';
				str=str+'讲师：'+d.name;
				str=str+'<a href="../details.php?id='+d.id+'">马上学习</a></strong>';
				str=str+'</strong>';
				str=str+'</p>';
				str=str+'</li>';
				}
			$('#studyList ul').append(str);
			}
		});
	}
</script>
<style>
body{margin-top:80px;}
</style>
</head>

<body>
<?php include '../inc/header_1.php'?>

<section id="userCotent">
	<div class="wrap">
		<ul class="leftMenu"><?php require_once('userMenu.php')?></ul>
        
        <div class="rightContent">
        	<ul class="tMenu">
            	<li><a href="#" class="line on">购买的</a></li>
            	<li><a href="#">收藏的</a></li>
            	<li><a href="#">已报名的</a></li>
            </ul>
            
            <div class="list" id="studyList"><ul></ul></div>
            
            <div class="guess">
            	<div class="title">猜你喜欢<a href="#">更多 ></a></div>
                <ul>
                <?php
                $str='';
				$sql="select it_course.id,it_course.title,it_course.img,it_user_teacher.name,(select count(*) from it_user_study where courseid=it_course.id) as num
				      from it_course
					  left join it_user_teacher on it_user_teacher.id=it_course.teacher_id
					  where it_course.genre=0
					  order by rand() limit 4
					  ";
				$rs=mysql_query($sql);
				while($row=mysql_fetch_array($rs)){
					$str.='<li>';
					$str.='<a href="../details.php?id='.$row[0].'"><img src="'.$row[2].'">';
					$str.='<p>';
					$str.='<b>'.$row[1].'</b>';
					$str.='<span>'.$row[3].'</span>';
					$str.='<span>学习人数：'.$row[4].'人</span>';
					$str.='<strong>去看看</strong>';
					$str.='</p>';
					$str.='</li>';
					}
				echo $str;
				?>
                </ul>
            </div>
        </div>
        
    </div>
</section>
<style>
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
</style>
</body>
</html>