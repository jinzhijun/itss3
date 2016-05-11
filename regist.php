<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>用户登录 - 中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
		$('#getCode').click(function(){//发送手机验证码
			var username=$('#username').val();
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
			if(!myreg.test(username)){
				alert('请输入正确手机号');
				return false;
				}			
			var o=$(this);
			var count=60;
			var countdown = setInterval(function(){
				o.attr("disabled", "disabled");
				o.attr("value","重新发送" + count + "s");
				if (count == 0) {
					o.removeAttr("disabled");
					o.attr("value","点击获取短信验证码");
					clearInterval(countdown);
					}
					count--;
				}, 1000);
				$.post('phpsms/sms.php',{mobile:username},function(e){
					if(e=="该手机号码已注册"){
						alert(e);
						count=0;
						}
 					});
			});
	
	$('button').click(function(){
		var username=$('#username').val();
		var code=$('#code').val();
		var password=$('#password').val();
		
			if(username==''){
				$('#regist #username').focus().css({borderColor:'red'});
				return false;
				}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
			if(!myreg.test(username)){
				alert('请输入正确手机号');
				return false;
				}			
			
			if(code==''){
				alert('请输入短信验证码');
				return false;
				}
			if(password==''){
				alert('请输入登录密码');
				return false;
				}
			//用户注册
			$.ajax({
				url:"json/regist.php",
				data:{username:username, code:code, password:password},
				type: "post",
				dataType:"json",
				success: function(e){
					alert(e.msg);
					if(e.success==0){
						window.location.href='index.php'
						}
					}
				});
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
      <th width="60%">用户注册</th>
      <td rowspan="6" class="line">
      	<div class="ewm"><img src="images/code01.jpg"><br>关注云教育平台<br>课程、作业、讨论<br>随时随处自在学习</div>
      </td>
    </tr>
    <tr>
      <td>账号：<br><input type="text" id="username" placeholder="手机号码"></td>
    </tr>
    <tr>
      <td>短信验证码：<br>
      <input type="text" id="code"><input type="button" id="getCode" value="获取短信验证码"></td>
    </tr>
    <tr>
      <td>密码：<br><input type="text" id="password"></td>
    </tr>
    <tr>
      <td><button>注册</button></td>
    </tr>
    <tr>
      <td>已经有账号了，<a href="login.php">马上登录</a></td>
    </tr>
  </table>
</div>
</body>
</html>