<?php
session_start();
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
$classify=$_SESSION['classify'];
?>
<header>
	<div class="wrap" id="header">
    	<a href="#" id="logo"><img src="../images/logo.png"></a>
        <ul id="nav">
        	<li><a href="/new_index.php">首页</a></li>
        	<li><a href="/CourseList.php">全部课程</a></li>
        	<li><a href="/zCourseList.php">直播课</a></li>
        	<li><a href="#">学习中心</a></li>
        </ul>
        <input type="text" id="q" placeholder="课程搜索">
        <?php
        if(empty($userid)){
		?>
        <ul id="tool-box">
        	<li id="login"><a href="/login.php">登录</a></li>
        	<li id="register"><a href="/regist.php">注册</a></li>
        </ul>
        <?php
		}else{
		?>
        <a href="#" id="user-box" title="进入个人中心">
        	<font><?php echo $username?></font>
            <span><img src="../images/headimgurl.jpg"></span>
        </a>
        <?php
		}
		?>
    </div>
</header>

