        <div id="userTopMenu">
            <span class="username"><?php echo $username.'<br>欢迎访问云教育'?></span>
            <img src="../images/headimgurl.jpg" class="headimg">
            <ul>
            <img src="../images/user-top.png">
            <li><a href="../user/">个人主页</a></li>
            <li><a href="#">反馈意见</a></li>
            <li><a href="#">设置</a></li>
            <li><a href="/exit.php">退出</a></li>
            </ul>
        </div>
<script type="text/javascript">
$(function(){
	var userid='<?php echo $userid?>';
	if(userid!=''){
		$('#header').find('button').hide();
		$('#userTopMenu').show();
		$('#userTopMenu').hover(function(){
			$(this).find('ul').show();
			},function(){
				$(this).find('ul').hide();
				});
		}
	})
</script>
<style>
#userTopMenu{float:right; margin:30px 0 0 0; cursor:pointer; position:relative; z-index:9999999; display:none;}
#userTopMenu .headimg{height:40px; width:40px; border-radius:100px; float:left;}
#userTopMenu .username{float:left; margin-right:10px; display:block; padding:5px 0;}
#userTopMenu ul{position:absolute; border:#ddd solid 1px; top:50px; right:-1px; background:#fff; width:120px; padding:8px; display:none;}
#userTopMenu ul li{padding:0 !important; float:none !important; display:block !important; overflow:hidden; }
#userTopMenu ul li:last-child{border-top:#ddd solid 1px;}
#userTopMenu ul li a{color:#666; text-decoration:none; line-height:30px; display:block; padding:0 10px; width:100%;}
#userTopMenu ul li a:hover{background:#f1f1f1;}
#userTopMenu ul img{position:absolute; top:-10px; left:30px;}
</style>