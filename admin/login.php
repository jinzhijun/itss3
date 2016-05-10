<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.5)"> 
<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.5)">
<title>管理员登录</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('#login').css({left:($(window).width()-$('#login').width())/2}).keyup(function(e){
		if(e.keyCode==13){
			$('#but').click();
			}
		});
	$('#but').click(function(){
		var but=$(this);
		but.attr("disabled","disabled");
		but.attr("value","登录中...")
		$.ajax({
			type: "post", 
			url: "json/login_json.php",
			data: {username:$('#username').val(), password:$('#password').val()},
			dataType: "json", 
			success: function (e) {
				if(e.success==''){
					window.location.href='index.php';
					}else{
						alert(e.msg);
						but.removeAttr("disabled"); 
						but.attr("value","登 录")
						}
				},
			error: function (XMLHttpRequest, textStatus, errorThrown){
				but.removeAttr("disabled");
				but.attr("value","登 录")
				}
			});
		});
	});
</script>
<link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="login">
<h1>管理员登陆</h1>
<label><input type="text" id="username" placeholder="账号"></label>
<label><input type="password" id="password" placeholder="密码"></label>
<input type="button" value="登 录" id="but">
</div>
</body>
</html>