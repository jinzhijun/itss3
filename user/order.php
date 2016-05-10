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
	});
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
            	<li><a href="#" class="line on">我的订单</a></li>
            </ul>
            
            <div class="list">
            	<ul>
                <center>暂时还没有该状态的订单</center>
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