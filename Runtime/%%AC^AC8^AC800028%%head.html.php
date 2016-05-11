<?php /* Smarty version 2.6.18, created on 2016-04-07 06:35:08
         compiled from Public/head.html */ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台-直播课题</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.lazyload.js" type="text/javascript"></script>
<script src="js/jquery.login.js" type="text/javascript"></script>
<style>
body{margin-top:80px;}
#banner{background:url(images/live.jpg) top center no-repeat; height:442px;}
</style>
</head>

<header>
	<div id="header" class="wrap">
    	<div class="logo"><img src="/images/logo-w.png"></div>
        <ul class="nav">
        	<li><a href="../index.php">首页</a></li>
        	<li><a href="#">课程体系</a></li>
        	<li><a href="../find.php">找课程</a></li>
        	<li><a href="../live.php">直播</a></li>
        	<li><a href="index.php">学习中心</a></li>
        </ul>
        	
        <ul class="sNav">
        	<input name="keyword" type="text" id="keyword" placeholder="搜索课程、老师">
            <button>登录/注册</button>
            <?php echo '<?php'; ?>
 include "inc/user_top.php";<?php echo '?>'; ?>

        </ul>
    </div>
</header>
<script>
$(function(){
	$('#keyword').keyup(function(e){
		if(e.keyCode==13){
			window.location.href='find.php?keyword='+$(this).val();
			}
		});
	});
</script>