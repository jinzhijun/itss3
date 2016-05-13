<header>
	<div id="header" class="wrap">
    	<div class="logo"><img src="/images/logo-w.png"></div>
        <ul class="nav">
        	<li><a href="/index.php">首页</a></li>
        	<li><a href="/CourseList.php">全部课程</a></li>
        	<li><a href="/zCourseList.php">直播课</a></li>
        	<li><a href="/user/">学习中心</a></li>
        </ul>
        	
        <ul class="sNav">
        	<input name="keyword" type="text" id="keyword" placeholder="搜索课程、老师">
            <button>登录/注册</button>
            <?php include "../inc/user_top.php";?>
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

<?php
ini_set('date.timezone','Asia/Shanghai');
$strTimeToString = "000111222334455556666667";
$strWenhou = array('夜深了！','凌晨了！','早上好！','上午好！','中午好！','下午好！','晚上好！','夜深了！');

$hello=array(
'人类被赋予了一种工作，那就是精神的成长。',
'美国女神一手拿着火炬，一手拿着书，这是告诉我们停电也要学习。',
'天赋如同自然花木，要用学习来修剪。',
'活着就要学习，学习不是为了活着。',
'知识的价值不在于占有，而在于使用。',
'Stay hungry,stay foolish.',
'知识是一种快乐，而好奇则是知识的萌芽。',
'就在线学习而言，重要的不是你花了多少钱，而是你投入了多少时间和精力。'
);

?>

<section id="userTop">
	<div class="wrap">
    <img src="../images/headimgurl.jpg" class="headimg">
    <p>
    <h1><?php echo 'yjy',$username.','.$strWenhou[(int)$strTimeToString[(int)date('G',time())]];?></h1>
    <h2><?php echo $hello[rand(0,7)]?></h2>
    </p>
    </div>
</section>

