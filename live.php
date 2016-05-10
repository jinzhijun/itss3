<?php
include "inc/config.php";
include "inc/user_info.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台-直播课题</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.lazyload.js" type="text/javascript"></script>
<script src="js/jquery.login.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('#header button').click(function(){
		$('body').login();
		});
	});
</script>
<style>
body{margin-top:80px;}
#banner{background:url(images/live.jpg) top center no-repeat; height:442px;}
#live{overflow:hidden; margin:30px;}
#zvideo{float:left; background:#fff; width:78%; padding:2% 0 2% 2%; text-align:justify;}
#zvideo li{width:30%; display:inline-block; background:#f8f8f8; margin-right:25px; position:relative;}
#zvideo li a img{width:100%;}
#zvideo li .over{position:absolute; bottom:5px; right:5px}
#zvideo li div{margin:0 10px;}
#zvideo a{display:block; text-decoration:none;}
#zvideo .title{color:#000; font:14px/30px '微软雅黑'; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
#zvideo .price{font:20px/20px '微软雅黑'; color:red;}
#zvideo .timer{font:12px/30px '微软雅黑'; color:#999;}

#zpyg{width:18%; float:right; background:#fff;}
#zpyg h1{ border-bottom:#ddd solid 1px; font:18px/50px '微软雅黑'; padding:0 10px;}
#zpyg center{font:15px/60px ''; color:#ccc;}
</style>
</head>

<body>
<?php include 'inc/header.php';?>
<div id="banner"></div>

<section id="live">
	<div class="wrap">
    	<ul id="zvideo">
        	<?php
			$str='';
            $sql="select 
				it_course.id, 
				it_course.title, 
				it_course.price, 
				it_course.img,
				it_course_video_time.b_time,
				it_course_video_time.e_time
				from it_course
				left join it_course_video_time on it_course_video_time.courserid=it_course.id
				where it_course.genre='1'
				order by it_course.id desc limit 12
				";
				$rs=mysql_query($sql);
				while($row=mysql_fetch_array($rs)){
					$nowtime=strtotime(date("Y-m-d G:i:s"));
					$e_time=strtotime($row['e_time']);
					$title=$row['title'];
					$str.='<li>';
					$str.='	<a href="live_detail.php?id='.$row[0].'" title="">';
					$str.='		<img src="'.$row['img'].'">';
					$str.='		<div class="title">'.$title.'</div>';
					if($row['price']==0){
						$str.='<div class="price">免费</div>';
						}else{
							$str.='<div class="price">&yen; '.$row['price'].'</div>';
							}
					$str.='		<div class="timer">直播：'.$row['b_time'].' - '.date("H:i:s ", $e_time).'</div>';
					$str.='	</a>';
					if($nowtime > $e_time) $str.='<img src="images/over.png" class="over">';
					$str.='</li>';
					}
				echo $str;
			?>
        	<li></li>
        </ul>
        <ul id="zpyg">
        	<h1>直播预告</h1>
            <center>暂无信息</center>
        </ul>
    </div>
</section>

<?php include 'inc/footer.php'?>
<style>
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
</style>
</body>
</html>