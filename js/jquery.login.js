(function($){
	$.fn.login=function(options){
		var defaults={
		};
		var opts = $.extend(defaults,options);
		_close();
		
		var str='<mask></mask><div id="login" class="frmTab">';//窗口
		str=str+'<a href="javascript:void(0);" title="关闭" id="xx">×</a>';
		str=str+'<h1>用户登录</h1>';
		str=str+'<label class="box"><input type="text" id="username" maxlength="11" placeholder="ITSS账号"></label>';
		str=str+'<label class="box"><input type="password" id="password" placeholder="密码"></label>';
		str=str+'<div><label for="chk"><input type="checkbox" id="chk" name="chk">自动登录</label><a href="#">忘记密码?</a></div>';
		str=str+'<button>登 录</button>';
		str=str+'<a href="#" class="reg"><font>没有账号?</font> 立即注册 >></a>';
		str=str+'</div>';
		
		str=str+'<div id="regist" class="frmTab">';
		str=str+'<a href="javascript:void(0);" title="关闭" id="xx">×</a>';
		str=str+'<h1>用户注册</h1>'
		str=str+'<label class="box"><input type="text" id="username" maxlength="11" placeholder="手机号码"></label>';
		str=str+'<label class="box"><input type="text" id="code" placeholder="验证码" maxlength="6" style="width:110px; float:left;"><input type="button" id="getCode" value=点击获取短信验证码></label>';
		str=str+'<label class="box"><input type="password" id="password" placeholder="密码"></label>';
		str=str+'<label class="tyxy"><input type="checkbox">我同意并接受同意《<a href="#">用户协议</a>》</label>';
		str=str+'<button>注 册</button>';
		str=str+'<a href="#" class="login"><font>已经有账号，</font> 马上登录 >></a>';
		str=str+'</div>';
		
		$('body').append(str);
		$('#login').css({left:($(window).width()-$('#login').width())/2})
		$('#login').animate({
			top:150
			},200);
		
		$('body .box input').click(function(){
			$(this).css({borderColor:'#ddd'});
			});
		
		$('body #xx').click(function(){//关闭窗口
			_close();
			});
		////////	
		$('#login button').click(function(){//点击登录按钮
			_login();
			});
		$('#login').keypress(function(event){//回车登录
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode==13){
				_login();
				}
			});
		///////
		$('#regist button').click(function(){//注册
			_regist();
			})
		$('#regist').keypress(function(event){//回车注册
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode==13){
				_regist();
				}
			});

		$('#login .reg').click(function(){
			$('#login').animate({left:-1000},500);
			$('#regist').css({top:150,right:-1000}).animate({right:($(window).width()-$('#regist').width())/2-50},500)
			});
		
		$('#regist .login').click(function(){
			$('#regist').animate({right:-1000},200);
			$('#login').animate({left:($(window).width()-$('#login').width())/2},500);
			});
		
		$('#getCode').click(function(){//发送手机验证码
			var username=$('#regist #username').val();
			if(username==''){
				$('#regist #username').focus().css({borderColor:'red'});
				return false;
				}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
			if(!myreg.test(username)){
				$('#regist #username').focus().css({borderColor:'red'});
				tip('请输入正确手机号');
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
						count=0;
						}
 					});
			});
		
		function _login(){
			var username=$('#login #username').val();
			var password=$('#login #password').val();
			
			if(username==''){
				$('#login #username').focus().css({borderColor:'red'});
				return false;
				}
			if(password==''){
				$('#login #password').focus().css({borderColor:'red'});
				return false;
				}
			
			//ajax登录代码
			$.ajax({
				type: "post",
				url: "json/login.php",
				data:{username:username, password:password},
				dataType: "json", 
				success: function (e){
					if(e.success==0){
						location.reload();
						}else{
							tip(e.msg);
							}
					},
				error: function (XMLHttpRequest, textStatus, errorThrown){
					tip('登录超时');
					}
				});
			//window.location.href="/user/"		
			}
		
		function _regist(){
			var username=$('#regist #username').val();
			var code=$('#regist #code').val();
			var password=$('#regist #password').val();
			
			if(username==''){
				$('#regist #username').focus().css({borderColor:'red'});
				return false;
				}
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
			if(!myreg.test(username)){
				$('#regist #username').focus().css({borderColor:'red'});
				tip('请输入正确手机号');
				return false;
				}			
			
			if(code==''){
				$('#regist #code').focus().css({borderColor:'red'});
				return false;
				}
			if(password==''){
				$('#regist #password').focus().css({borderColor:'red'});
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
					if(e.success==0) location.reload();
					}
				});
			}
		
		function _close(){//关闭函数
			$('body mask').remove();
			$('body #login').remove();
			$('body #regist').remove();
			}		
		
		function tip(string){
			$('body').append('<div id="tip">'+string+'</div>');
			$('#tip').css({left:($(window).width()-$('#tip').width())/2}).animate({top:0});
			setTimeout(function(){
				$('#tip').remove();
				},3000);
			}
	};
	})(jQuery);