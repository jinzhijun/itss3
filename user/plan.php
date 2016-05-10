<?php
include "../inc/config.php";
include "../inc/user_info.php";
if(empty($userid)){
	header("location: ../login.php");
	}
$url = $_SERVER['PHP_SELF']; //获取当前页面名称 
$filename= substr( $url , strrpos($url , '/')+1 );
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台-我的订单</title>
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
	plan();
	});

function plan(){
	$.ajax({
		url:"json/myPlan.php", 
		dataType:"json",
		success: function(e){
			var data=e.d;
			var str='';
			for(var i=0; i<data.length; i++){
				var d=data[i];
				str=str+'<li><a href="../course.php?id='+d.id+'" target="_blank">';
				str=str+'<img src="'+d.img+'">';
				str=str+'<div class="per"><b style="width:'+d.percent+'%"></b></div>';
				str=str+'<div class="title">'+d.title+'</div>';
				str=str+'<div class="teacher">讲师：'+d.name+'</div>';
				str=str+'</a></li>';
				}
			$('#myPlan ul').append(str)
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
            	<li><a href="#" class="line on">我的学习计划</a></li>
            	<li><a href="#">看看别人的学习计划 〉</a></li>
            </ul>
            
            <div id="myPlan"><ul></ul></div>
            
        </div>
        
    </div>
</section>
<style>
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
/*学习计划*/
#myPlan ul{ overflow:hidden; text-align:justify; padding:5px;}
#myPlan ul li{width:200px; padding:5px; background:#fff; display:inline-block; box-shadow:2px 2px 5px #ccc;}
#myPlan ul li img{width:200px; height:120px;}
#myPlan .per{width:100%; height:3px; background:#ccc;}
#myPlan .per b{display:block; height:3px; background:green;}
#myPlan a{text-decoration:none;}
#myPlan .title{font:12px/30px ''; color:#000; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
#myPlan .teacher{color:#999;}
</style>
</body>
</html>