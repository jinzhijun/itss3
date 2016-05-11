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
            <?php include "inc/user_top.php";?>
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
