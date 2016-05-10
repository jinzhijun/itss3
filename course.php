<?php
include "inc/config.php";
include "inc/user_info.php";

$id=$_GET['id'];
$sql="select it_course.id,
			 it_course.title,
			 it_course.img,
			 it_course.description,
			 it_course.content,
			 it_course.service,
			 it_course.price,
			 it_course.isShow,
			 it_course.hits,
			 it_user_teacher.name,
			 it_user_teacher.headimg,
			 it_user_teacher.introduction
			 from it_course 
			 left join it_user_teacher on it_user_teacher.id=it_course.teacher_id
			 where it_course.id='$id'";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$title=$row['title'];
	$img=$row['img'];
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
	if($price==0){
		$price_str="免费";
		}else{
			$price_str="&yen; ".$price;
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
	$('header button').click(function(){
		$('body').login();
		});
	$('#course-top .course-tool li').click(function(){
		$('#course-top .course-tool li').removeClass('on');
		$(this).addClass('on');
		});
	$('#course-top button').click(function(){
		var userid='<?php echo $userid?>';
		if(userid==''){
			$('header button').click();
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
					window.location.href='courseMain.php?id=<?php echo $id?>';
					}
				//alert(e.msg)
				},
			error: function (XMLHttpRequest, textStatus, errorThrown){alert('访问超时');}
			});
		});
	});
</script>
</head>

<body>
<?php include 'inc/header.php';?>
<section class="wrap">
	<div id="course-top">
    	<div class="course-img"><img src="<?php echo $img?>" height="250" width="400"></div>
        <div class="course-info">
        	<p><?php echo $title?></p>
            <div class="discuss"><b><?php echo $hits?></b><strong>(0)</strong></div>
            <div class="description"><?php echo $description?></div>
            <div class="price"><?php echo $price_str?></div>
            <button>立即参加</button>
        </div>
        <ul class="course-tool">
        	<li class="on"><a href="javascript:;">主页</a></li>
        	<li><a href="javascript:;">笔记</a></li>
        	<li><a href="javascript:;">讨论区</a></li>
        </ul>
    </div>
</section>

<section id="course_cotent" class="wrap">
	<div class="left">
    	<div id="content">
        <p class="service">适用人群：<?php echo $service?></p>
        <p style="font-size:18px; display:block; margin-bottom:20px;">简介</p>
		<?php echo $content?>
        </div>
        <div id="catalogue">
        <p>目录</p>
        <ul>
        <?php
        $sql="select * from it_course_video where course_id='$id' order by id asc";
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			if($row['url']==''){
				echo '<li><span>'.$row['title'].'</span></li>';
				}else{
					echo '<li><a href="#">'.$row['title'].'</a></li>';
					}
			}
		?>
        </ul>
        </div>
    </div>
    <div class="right">
    	<div id="teacher">
        	<center title="已认证"><img src="<?php echo $headimg?>"><span><?php echo $name?></span></center>
            <p><?php echo $introduction?></p>
        </div>
    </div>
</section>


<?php include 'inc/footer.php';?>
<style>
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
</style>

</body>
</html>