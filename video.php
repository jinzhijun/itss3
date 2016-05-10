<?php
include "inc/config.php";
include "inc/user_info.php";
$id=$_GET['id'];
$courseid=$_GET['course_id'];

$sql="select count(*) from it_user_study where courseid='$courseid' and userid='$userid'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	if($row[0]==0){
		header("Location: /");
		}
	}
	
$sql="select it_course.id,
			 it_course.title,
			 it_course.img,
			 it_course.description,
			 it_course.content,
			 it_course.service,
			 it_course.price,
			 it_course.isShow,
			 it_course.hits,
			 it_course.genre,
			 it_user_teacher.name,
			 it_user_teacher.headimg,
			 it_user_teacher.introduction
			 from it_course 
			 left join it_user_teacher on it_user_teacher.id=it_course.teacher_id
			 where it_course.id='$courseid'";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$title=$row['title'];
	$img=$row['img'];
	$genre=$row['genre'];
	$description=$row['description'];
	$content=$row['content'];
	$service=$row['service'];
	$price=$row['price'];
	$isShow=$row['isShow'];
	$hits=$row['hits'];
	$name=$row['name'];
	$headimg=$row['headimg'];
	$introduction=$row['introduction'];
	if(empty($isShow)){//课程离线，自动跳转到首页 
		header("Location: /");
		exit;
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title><?php echo $title?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.lazyload.js" type="text/javascript"></script>
<script src="js/jquery.login.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	var courseid=<?php echo $courseid?>;
	var videoid=<?php echo $id?>;
	var w=$(window).width();
	var h=$(window).height();
	
	$('#vdo_tab').css({height:h})
	
	$('header button').click(function(){
		$('body').login();
		});
	
	$.ajax({
		type: "post", 
		url: "json/video.php",
		data: {courseid:courseid},
		dataType: "json", 
		success: function (e) {
			var data=e.d;
			for(var i=0; i<data.length; i++){
				var d=data[i];
				if(d.id==videoid){
					var vod='<div class="vod-title">'+d.title+'</div><embed src="'+d.url+'" quality="high" width="90%" height="500" align="middle" allowScriptAccess="always" allowFullscreen="true" type="application/x-shockwave-flash"></embed>';
					$('#vod').append(vod);
					$('#c'+d.id).find('a').css({background:'#000',color:'#fff'})
					}
				}
			}
		});
	});
</script>
<style>
body{background:#67686d; margin:0;}
#vod embed{box-shadow:1px 1px 10px #333;}
.vod-title{ text-align:left; padding:60px 0 20px 5%; font-size:15px; color:#fff;}
#back{position:absolute; top:15px; left:0; background:#a1a3a8 url(images/back.png) 10px center no-repeat; display:block; padding:5px 10px 5px 30px; box-shadow:1px 1px 1px #333; color:#444; text-decoration:none; border-radius:0 5px 5px 0;}
#back:hover{background-color:#adafb3;}
</style>
</head>

<body>
<?php
if(empty($genre)){
	echo '<a href="courseMain.php?id='.$courseid.'" id="back">返回课程首页</a>';
	}else{
		echo '<a href="live_detail.php?id='.$courseid.'" id="back">返回课程首页</a>';
		}
?>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" id="vdo_tab">
  <tr>
    <td width="75%" align="center" valign="top" id="vod"></td>
    <td width="25%" valign="top" style="background:#fff; box-shadow:1px 1px 10px #333;">
<table width="100%" border="0" cellspacing="15" cellpadding="0" bgcolor="#abadb0">
  <tr>
    <td valign="top"><p style="font-size:14px; color:#333; padding:0; margin:0; height:50px;"><?php echo $title?></p><font color="#666">讲师：<?php echo $name?></font></td>
    <td width="120"><img src="<?php echo $img?>" style="width:120px; height:65px; box-shadow:2px 2px 2px #666;"></td>
  </tr>
  </table>

        <div id="catalogue" style="margin:0; box-shadow:none; border:none;">
        <p style="background:#d2d5da">目录</p>
        <ul>
        <?php
        $sql="select * from it_course_video where course_id='$courseid' order by id asc";
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			if($row['url']==''){
				echo '<li><span>'.$row['title'].'</span></li>';
				}else{
					echo '<li id="c'.$row['id'].'"><a href="video.php?id='.$row[0].'&course_id='.$courseid.'">'.$row['title'].'</a></li>';
					}
			}
		?>
        </ul>
        </div>
    </td>
  </tr>
</table>


</body>
</html>