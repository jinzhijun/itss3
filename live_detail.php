<?php 
include "inc/config.php";
include "inc/user_info.php";
$id=$_GET['id'];

$sql="select 
	it_course.id, 
	it_course.title, 
	it_course.price, 
	it_course.img,
	it_course.content,
	it_course.service,
	it_course.genre,
	it_course_video_time.b_time,
	it_course_video_time.e_time,
	it_user_teacher.name,
	it_user_teacher.introduction
	from it_course
	left join it_course_video_time on it_course_video_time.courserid=it_course.id
	left join it_user_teacher on it_course.teacher_id=it_user_teacher.id
	where it_course.genre='1' and it_course.id='$id'
	";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$title=$row['title'];
	$content=$row['content'];
	$service=$row['service'];
	$price=$row['price'];
	$teacher=$row['name'];
	$b_time=$row['b_time'];
	$e_time=$row['e_time'];
	$introduction=$row['introduction'];
	$t=timediff(strtotime($b_time), strtotime($e_time));
	$nowtime=strtotime(date("Y-m-d G:i:s"));
	$e_time=strtotime($e_time);
	$genre=$row['genre'];
	}else{
		header("location: /"); exit;
		}
$nowtime=strtotime(date("Y-m-d G:i:s"));
if($genre==0){
	header("location: /"); exit;
	}

//判断用户是否已经购买
$ifBuy=0;
if(!empty($userid)){
	$sql="select count(*) from it_user_study where userid='$userid' and courseid='$id'";
	$rs=mysql_query($sql);
	$row=mysql_fetch_array($rs);
	$ifBuy=$row[0];
	}

function timediff($begin_time,$end_time) { 
	if($begin_time < $end_time){ 
         $starttime = $begin_time; 
         $endtime = $end_time; 
	} 
	else{ 
         $starttime = $end_time; 
         $endtime = $begin_time; 
	} 
      $timediff = $endtime-$starttime; 
      $days = intval($timediff/86400); 
      $remain = $timediff%86400; 
      $hours = intval($remain/3600); 
      $remain = $remain%3600; 
      $mins = intval($remain/60); 
      $secs = $remain%60; 
      $res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs); 
      return $res; 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台- <?php echo $title?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.lazyload.js" type="text/javascript"></script>
<script src="js/jquery.login.js" type="text/javascript"></script>
<script src="js/timer.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	var userid='<?php echo $userid?>';
	$("#timer").fnTimeCountDown("<?php echo $b_time?>");
	$('#header button').click(function(){
		$('body').login();
		});
	$('button.buy0').click(function(){
		if(userid==''){
			$('#header button').click();
			return false;
			}
		$.ajax({
			type: "post",
			url: "order/add_to_myCourse.php",
			data:{courseid:<?php echo $id?>},
			dataType: "json", 
			success: function (e){
				if(e.success==2){
					window.location.href='order/confirm.php';
					}
				else if(e.success==3){
					window.location.href='live_detail.php?id=<?php echo $id?>';
					}
				//alert(e.msg)
				},
			error: function (XMLHttpRequest, textStatus, errorThrown){alert('访问超时');}
			});
		});
	}) 
</script>
<style>
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
#banner{background:url(images/live.jpg) top center no-repeat; margin-top:-20px; height:440px;}
#t{height:440px; display:block;}
#t .list{background:#fff; background:rgba(255,255,255,0.9); height:440px; width:320px; float:right; position:relative;}
#timer *{display:inline-block; height:35px; padding:0 5px; font:14px/35px '微软雅黑';}
#timer b{ background:#000; color:#fff; font:bold 20px/35px '微软雅黑'; border-radius:5px;}
#timer i{font:bold 30px/35px ''; padding:0;}

.video_info{padding:30px 0;}
.video_info td{background:#fff;}
.video_info h1{font:23px/40px '微软雅黑'; margin-bottom:10px;}
.video_info h2{font:18px/40px '微软雅黑'; margin-bottom:10px; border-bottom:#ddd solid 1px;}
.price{padding:0 5%; font:25px/50px '微软雅黑'; color:#a9f855;}
.service{font:14px/20px '微软雅黑'; color:#666;}
#buy{position:absolute; left:0; bottom:0; width:100%; background:#000; padding:0 0 10px 0;}
#buy button{margin:0 5%; width:90%; color:#fff; height:40px; border:0; border-radius:5px; font-size:18px; cursor:pointer; outline:none;}
#buy .buy0{background:#F00;}
#buy .buy1{background:#808080;}
.bm{background:url(images/bm.png); width:60px; height:60px; position:absolute; right:5px; top:5px;}
.over{ background-position:0 60px;}

#video_list{padding:10px 0; border-top:#ddd solid 1px; border-bottom:#ddd solid 1px; margin-bottom:10px;}
#video_list a{display:block; background:#fafafa url(images/zvideo.png) 10px center no-repeat; font:14px/40px '微软雅黑'; color:#000; text-decoration:none; padding-left:35px; margin:0 20px; border-bottom:#ddd dashed 1px;}
#video_list a:hover{background-color:#eee;}
#video_list a:last-child{border:0;}
</style>
</head>

<body>
<?php include 'inc/header.php';?>

<div id="banner">
	<div class="wrap" id="t">
    	<div class="list">
        <table width="98%" border="0" cellspacing="0" cellpadding="10" >
          <tr>
            <td width="70" align="center">剩余时间</td>
            <td id="timer">
            <b class="day">00</b><span>天</span><b class="hour">00</b><i>:</i><b class="mini">00</b><i>:</i><b class="sec">00</b>
            </td>
          </tr>
          <tr>
            <td align="center">直播时间</td>
            <td><?php echo $b_time.' - '.date("H:i:s ", $e_time)?></td>
          </tr>
          <tr>
            <td align="center">课程时长</td>
            <td><?php echo sprintf("%02d", $t['hour']).' : '.sprintf("%02d", $t['min']).' : '.sprintf("%02d", $t['sec'])?></td>
          </tr>
          <tr>
            <td align="center">主讲老师</td>
            <td><?php echo $teacher?></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td><?php echo $introduction?></td>
          </tr>
        </table>
        <div id="remainTime"></div>
        <div id="buy">
        	<div class="price">
			<?php 
			if($price==0){
				echo '免费';
				}else{
					echo '&yen; '.$price;
					}
			?>
            </div>
            <?php
            if($nowtime > $e_time){
				echo '<div class="bm over"></div>';//报名结束
				}else{
					if($ifBuy==1){
						echo '<div class="bm"></div>';//报名成功
						}
					}
			?>
        	<button class="buy<?php echo $ifBuy?>">立即报名</button>
        </div>
        </div>
    </div>
</div>

<section class="wrap video_info">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" style="padding:20px;">
    <?php
    if($ifBuy==1){
	?>
    <h1>直播间</h1>
    <div id="video_list">
    <?php
    $sql="select * from it_course_video where course_id='$id'";
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs)){
		echo '<a href="video.php?id='.$row[0].'&course_id='.$id.'">'.$row['title'].'</a>';	
	}
	?>
    </div>
    <?php }?>
    <h1>课程介绍</h1><?php echo $content?>
    </td>
    <th width="30">&nbsp;</th>
    <td width="330" valign="top" style="padding:20px;">
    	<h2>适合人群</h2>
        <div class="service"><?php echo $service?></div>
    </td>
  </tr>
</table>
</section>

<?php include 'inc/footer.php';?>
</body>
</html>