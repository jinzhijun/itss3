<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>用户登录 - 中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('#loginBut').click(function(){
		var username=$('#username').val();
		var password=$('#password').val();
		
		if(username==''){
			alert('请输入用户名'); return false;
			}
		
		$.ajax({
			url:"json/login.php",
			data:{username:username, password:password},
			dataType:"json",
			type:"post",
			success: function(e){
				if(e.success==0){
					if(e.msg==0){
						window.location.href="/user/"
						}else{
							window.location.href="/teacher/";
							}
					}else{
						alert(e.msg)
						}
				}
			})
		});
	});
</script>
<link href="css/style0509.css" rel="stylesheet" type="text/css">
<style>
body{background:url(images/loginbg.jpg) top center no-repeat;}
</style>
</head>

<body>
<?php
include_once("inc/new_header.php");
?>
<div id="login" class="lrFrm">
  <table width="100%" border="0" cellspacing="15" cellpadding="0">
    <tr>
      <th width="60%">用户登录</th>
      <td rowspan="6" class="line">
      	<div class="ewm"><img src="images/code01.jpg"><br>关注云教育平台<br>课程、作业、讨论<br>随时随处自在学习</div>
      </td>
    </tr>
    <tr>
      <td>账号：<br><input type="text" id="username" placeholder="手机号码"></td>
    </tr>
    <tr>
      <td>密码：<br><input type="password" id="password"></td>
    </tr>
    <tr>
      <td><button id="loginBut">登录</button></td>
    </tr>
    <tr>
      <td>还没有账号，<a href="regist.php">立即注册</a></td>
    </tr>
  </table>
</div>
</body>
</html>