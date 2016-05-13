<?php
include_once("inc/config.php");
session_start();
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];

ini_set('date.timezone','Asia/Shanghai');

//判断用户是否登录
if(empty($userid)){
//	header("Location: login.php");
//	exit;
	$username="学生_".rand(111111,999999);
	}

$id=$_GET['id'];

//判断用户是否已经购买

$sql="select 
	it_course.id,
	it_course.title,
	it_course.content,
	it_course.price,
	it_course.isShow,
	it_course.genre,
	it_user_teacher.name,
	it_user_teacher.headimg,
	it_user_teacher.introduction,
	it_course_video_time.b_time,
	it_course_video_time.e_time,
	it_course_video_time.studentUrl,
	it_course_video_time.studentToken,
	it_user_study.addtime
	from it_course
	left join it_user_teacher on it_user_teacher.uid=it_course.teacher_id
	left join it_course_video_time on it_course_video_time.courserid=it_course.id
	left join it_user_study on it_user_study.courseid=it_course.id
	where it_course.id='$id'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$title=$row['title'];
	$content=$row['content'];
	$price=$row['price'];
	$isShow=$row['isShow'];
	$genre=$row['genre'];
	$name=$row['name'];
	$headimg=$row['headimg'];
	if($headimg =='') $headimg="images/headimgurl.jpg";
	$introduction=$row['introduction'];
	$studentUrl=$row['studentUrl'];
	$studentToken=$row['studentToken'];
	$isBuy=$row['addtime'];
	$b_time=$row['b_time'];
	$e_time=$row['b_time'];
	}

//课程目录
$start=0;
if($genre==0){
	$str='';
	$sql="select * from it_course_video where course_id='$id'";
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		if($row['url']==''){
			$str.='<h2>'.$row['title'].'</h2>';
			}else{
				$str.='<a href="javascript:;" data-url="'.$row['url'].'?nickname='.$username.'">'.$row['title'].'</a>';
				}
		}
}else{
	//判断直播时间
	$nowtime=strtotime(date("Y-m-d G:i:s"));
	if($nowtime<strtotime($b_time)){
		$start=1;
		}elseif($nowtime<strtotime($b_time)){
			$start=2;
			}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	//判断用户是否购买该课程
	var isBuy='<?php echo $isBuy?>';
	var price='<?php echo $price?>';
	var genre='<?php echo $genre?>';
	if((isBuy=='') && (price>0)){
		$('#mask').show();
		}else{
			$('#cc').attr('src','<?php echo $studentUrl?>?nickname=<?php echo $username?>&token<?php echo $studentToken?>')
			}
	$('#ML a').click(function(){
		var url=$(this).attr('data-url');
		$('#cc').attr('src',url);
		$('#ML a').removeClass('on');
		$(this).addClass('on');
		});
	$('#ML a').eq(0).click();
	$('#ML b').click(function(){
		var w=$(window).width();
		var fw=$('#cc').width();
		if(fw==w){
			$('#cc').animate({width:w-350});
			$('#ML').animate({right:0})
			}else{
				$('#cc').animate({width:w});
				$('#ML').animate({right:-300});
				}
		});
	if(genre=='0'){$('#ML').show()}
	
	//判断播放页面是否加载成功
	$('#loading').show();
	$("#cc").on("load",function(){
       $('#loading').hide();
    });
	
	//安全退出
	$('#user-box font').click(function(){
		window.location.href='/exit.php';
		});
	var classify='<?php echo $classify?>';
	$('#user-box img').click(function(){
		if(classify=='0'){
			window.location.href='/user/';
			}else{
				window.location.href='/teacher/';
				}
		
		});
	});
</script>
<link href="css/style0509.css" rel="stylesheet" type="text/css">
<style>
body{background:#f2f2f2;}
#mask{position:absolute; z-index:9; top:50px; left:0; height:600px; width:100%; background:#fff; opacity:0.3; display:none;}
#ML{position:absolute; z-index:5; top:50px; right:-300px; width:300px; height:600px; background:#fff url(images/line.jpg) 30px top no-repeat; display:none;}
#ML h1{padding:15px; font-size:20px; font-weight:normal; background:#fff;}
#ML h2{padding:10px 15px; background:#000; font-size:15px; color:#fff;}
#ML a{display:block; padding:10px 15px 10px 80px; color:#666; font-size:14px; text-decoration:none; background:url(images/v.jpg) 50px center no-repeat;}
#ML a:hover,#ML a.on{ background-color:#f1f1f1; color:#000;}
#ML b{border:#ddd solid 1px; width:45px; height:70px; color:#fff; position:absolute; top:250px; left:-47px; text-align:center; background:url(images/ml.png) center 10px no-repeat; background-size:20px; line-height:100px; overflow:hidden; font-size:14px; font-weight:normal; cursor:pointer;}
#ML b:hover{background-color:#3598db;}

#vedio_header #tool-box{position:absolute; top:23px; right:0;}
#vedio_header #tool-box li{display:inline-block;}
#vedio_header #tool-box li a{font:15px/15px '微软雅黑'; display:block; padding:0 10px; color:#fff; text-decoration:none;}
#back{text-decoration:none;position:absolute; z-index:999; top:0; left:10px; display:block; background:url(images/back1.png);height:50px; width:30px;opacity:1;}
#back:hover{opacity:0.8;}
#loading{position:absolute; z-index:99999; top:200px; left:0; width:100%; text-align:center; color:#fff; font-size:15px; display:none;}
</style>
</head>

<body>
<a href="javascript:history.go(-1);" id="back"></a>
<div id="mask"></div>
<div id="loading"><img src="images/logo-w-1.png"><br>视频加载中...</div>
<section id="vedio_header">
	<div class="course_title" style="width:950px; margin:0 auto; position:relative;">
    	<h1><?php echo $title?></h1>
        
        <?php
        if(empty($userid)){
		?>
        <ul id="tool-box">
        	<li id="login"><a href="/login.php" style="border-right:#fff solid 1px;">登录</a></li>
        	<li id="register"><a href="/regist.php">注册</a></li>
        </ul>
        <?php
		}else{
		?>
        <a href="javascript:;" id="user-box">
        	<font><?php echo $username?><br>安全退出</font>
            <span title="进入个人中心"><img src="../images/headimgurl.jpg"></span>
        </a>
        <?php
		}
		?>
        
    </div>
    <iframe id="cc" src="" frameborder="0" scrolling="no"></iframe>
    <div id="ML">
        <h1>课程目录</h1><b>目录</b>
        <?php echo $str;?>
    </div>
</section>

<section class="wrap">
<table width="100%" border="0" cellspacing="20" cellpadding="0">
  <tr>
    <td valign="top">
    <div id="vedio_content">
    <h1 class="title">课程介绍</h1>
    <div id="course_content"><?php echo $content?></div>
    </div>
    </td>
    <td width="280" valign="top">
    <div id="vedio_teacher">
    <h1 class="title">授课老师</h1>
    <table width="100%" border="0" cellspacing="10" cellpadding="0" id="teacher">
      <tr>
        <td width="80"><div id="heagimg"><img src="<?php echo $headimg?>"></div></td>
        <td valign="top" class="teacher_name"><?php echo $name?></td>
      </tr>
      <tr>
        <td colspan="2" class="introduction"><?php echo $introduction?></td>
      </tr>
    </table>
    </div>
    </td>
  </tr>
</table>
</section>

<?php include_once("inc/footer_1.php")?>
</body>
</html>