<?php
session_start();
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
$classify=$_SESSION['classify'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<style>
body{margin:0; padding:0;}
img{border:0;}
ul,li,h1,h2,h3,p,dd{margin:0; padding:0; list-style:none;}
*{font-size:12px; font-family:'微软雅黑';}
.wrap{width:1200px; margin:0 auto;}

/*顶部*/
header,#header{height:100px; position:relative;}
#header #logo{ position:absolute; top:30px; left:0;}
#header #top_search_frm{width:450px; padding:30px 0 0 450px;}
#header #top_search_frm *{float:left;}
#header #top_search_frm #q{width:350px; height:35px; border:#3598db solid 2px; padding:0 10px; outline:none;}
#header #top_search_frm #search_but{border:none; height:39px; width:50px; background:#3598db url(images/seach_but.png) center center no-repeat; background-size:40%; cursor:pointer; outline:none;}
#header #top_search_frm #search_but:hover{background-color:#008ee6;}
#header #top_search_frm #tip{width:100%; overflow:hidden;}
#header #top_search_frm a{display:block; margin:0 5px; color:#999; text-decoration:none; line-height:20px;}
#header #top_search_frm a:hover{color:#3598db;}
#header #tool-box{position:absolute; top:45px; right:0;}
#header #tool-box li{display:inline-block;}
#header #tool-box li a{font:15px/15px '微软雅黑'; display:block; padding:0 10px; color:#999; text-decoration:none;}
#header #tool-box li a:hover{color:#3598db;}
#header #tool-box #login{ border-right:#999 solid 1px;}

#user-box{position:absolute; top:10px; right:0;}
#user-box font{display:block; color:#999; height:35px; width:60px; float:left; font:12px/15px '微软雅黑'; margin-right:5px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; padding-top:5px;}
#user-box span{display:block; width:35px; height:35px; border:#f1f1f1 solid 2px; border-radius:100px; overflow:hidden;  float:left;}
#user-box span img{width:100%; height:100%;}

/*分类*/
#nav{height:40px; position:relative;}
#cate{width:245px; display:inline-block; position:relative;}
#cate a{display:inline-block; text-decoration:none; padding-left:12px;}
#cate h1{background:#3598db url(images/cate_icon.png) 8px center no-repeat; height:40px; padding-left:45px; font:16px/40px '微软雅黑'; color:#fff;}
#cate ul{position:absolute; top:40px; left:0; width:100%; background:#008ee6; height:430px; z-index:999999;}
#cate ul li{background:url(images/right-arrow.png) 220px 10px no-repeat; background-size:20px 20px; border-bottom:#3598db solid 1px; height:71px; position:relative;}
#cate ul li:last-child{border:none;}
#cate ul li:hover{background-color:#4a7dbe;}
#cate h2 a{font:16px/40px '微软雅黑'; color:#fff; }
#cate h2 a:hover{text-decoration:underline;}
#cate p a{font:13px/20px '微软雅黑'; color:#fff; opacity:0.95;}
#cate p a:hover{opacity:1;}
#cate #right_cate{position:absolute; left:245px; top:0; width:400px; border:#4a7dbe solid 2px; padding:20px; background:rgba(255,255,255,0.8); display:none;}
#cate #right_cate dd{border-bottom:#ddd solid 1px;}
#cate #right_cate a{font-size:13px; line-height:40px; color:#000;}
#cate #right_cate a:hover{color:#4a7dbe;}
#cate h3{display:inline-block; width:100px;}
#cate h3 a{color:#4a7dbe !important;}

/*菜单*/
#sNav{display:inline-block; margin-left:20px;}
#sNav li{display:inline-block;}
#sNav li a{display:block; padding:0 15px; font:15px/40px '微软雅黑'; color:#000; text-decoration:none;}
#sNav li a:hover{color:#3598db;}

/*公告列表*/
#notice{position:absolute; z-index:99999; top:60px; right:0; width:240px; height:390px; background:rgba(0,0,0,0.6);}
#notice center{padding:10px; background:#000; font:15px/22px '微软雅黑'; color:#fff;}
#notice ul{padding:20px;}
#notice a{color:#fff; text-decoration:none; line-height:30px; display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
#notice a:hover{text-decoration:underline;}

/*我要开课*/
#apply_video{float:right; cursor:pointer; position:relative; background:url(images/down-arow.png) right center no-repeat; padding-right:20px;}
#apply_video h1{font:14px/40px '微软雅黑';}
#apply_video ul{display:none; position:absolute; z-index:99999999; top:40px; right:0; border:#ddd solid 1px; background:#fff; width:130px;}
#apply_video ul li:first-child{border-bottom:#ddd solid 1px;}
#apply_video ul li a{font:14px/40px '微软雅黑'; color:#000; text-decoration:none; display:block; padding:0 20px;}
#apply_video ul li a:hover{color:#3598db;}

/*幻灯片*/
#banner{margin-bottom:30px;}
#focus{width:950px;height:430px;overflow:hidden;position:relative; margin:0 auto;}
#focus ul{height:430px;position:absolute;}
#focus ul li{float:left;width:950px;height:430px;overflow:hidden;position:relative;}
#focus ul li div{position:absolute;overflow:hidden;}
#focus .btnBg{position:absolute;width:950px;height:20px;left:0;bottom:0;}
#focus .btn{position:absolute;width:930px; padding:5px 10px;right:0;bottom:20px;text-align:center;}
#focus .btn span{display:inline-block;_display:inline;_zoom:1;width:8px;height:8px;_font-size:0;margin-left:5px;cursor:pointer; border-radius:100px; border:#000 solid 1px; background:#fff;}
#focus .btn span.on{background:#000;}
#focus .preNext{width:45px;height:100px;position:absolute;top:150px;background:url(images/sprite.png) no-repeat 0 0;cursor:pointer;}
#focus .pre{left:130px;}
#focus .next{right:130px;background-position:right top;}

.list ul{text-align:justify; margin-top:20px; overflow:hidden; width:100%;}
.list ul:after{content:"";height:0;width:100%;display:inline-block;overflow:hidden;}
.list ul li{border:#ddd solid 1px; display:inline-block; width:290px; *display:inline;*zoom:1;}
.list ul li:hover{box-shadow:1px 1px 3px #ccc;}
.list ul li a{color:#000; text-decoration:none;}
.list ul li a *{display:block;}
.list ul li a font{padding:10px; font-size:16px;}
.list ul li a span{padding:0 10px; color:#999;}
.list ul li a span *{display:inline-block; vertical-align:middle; margin-right:5px;}
.list ul li a b{margin:10px 0 10px 10px; display:inline-block; background:#e5e5e5; color:#999; font-weight:normal; padding:2px 5px; border-radius:3px;}
.list ul li p{padding:10px;}
.list ul li p i{float:right; color:red; font:13px/13px '微软雅黑';}

/*学习计划*/
#plan h1{font:20px/20px '微软雅黑'; text-align:center;}
/*列表*/
#index_list{margin-top:30px;}
#index_list h1{border-left:#3598db solid 8px; font:20px/28px '微软雅黑'; padding:0 10px;}
#index_list h1 a{ float:right; color:#666; text-decoration:none; font-size:14px;}

/*友情链接*/
#link h1{background:url(images/link.png) left center no-repeat; padding:20px 40px; border-bottom:#ddd solid 1px; font-size:20px; font-weight:normal;}
#link ul{overflow:hidden; width:100%;}
#link ul li{width:12%; float:left;}
#link ul li a{font:12px/40px '微软雅黑'; color:#000; text-decoration:none;}

footer{background:#000;}
#footer{padding:40px 0; overflow:hidden;}
#footer ul{float:left; overflow:hidden; margin-left:100px;}
#footer ul li{float:left; margin-right:60px;}
#footer ul li h1{font:16px/30px '微软雅黑'; color:#fff;}
#footer ul li a{display:block; color:#fff; text-decoration:none; font:12px/25px '微软雅黑'; opacity:0.8;}
#footer ul li a:hover{opacity:1;}
</style>
<script>
$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	var bgColor=['#bcbfc4','#082f96','#ffc701'];
	
	//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);

	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$("#focus .btn span").css("opacity",0.4).mouseover(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseover");

	//上一页、下一页按钮透明度处理
	$("#focus .preNext").css("opacity",0.2).hover(function() {
		$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0.2"},300);
	});

	//上一页按钮
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//下一页按钮
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$("#focus ul").css("width",sWidth * (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		//$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		$("#focus ul").stop(true,false).css({"left":nowLeft,opacity:0}).animate({opacity:1},900); //通过animate()调整ul元素滚动到计算出的position
		$('#banner').css({backgroundColor:bgColor[index],opacity:0}).animate({opacity:1},900);
		$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
		$("#focus .btn span").stop(true,false).animate({"opacity":"1"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
	}
	
	//分类
	$('#cate li').hover(function(){
		$(this).find('div').show();
		},function(){
			$(this).find('div').hide();
			});
	
	//我要开课
	$('#apply_video').hover(function(){
		$(this).find('ul').show();
		},function(){
			$(this).find('ul').hide();
			});
	//安全退出
	$('#user-box font').click(function(){
		window.location.href='exit.php';
		});
	var classify='<?php echo $classify?>';
	$('#user-box img').click(function(){
		if(classify=='0'){
			window.location.href='/user/';
			}else{
				window.location.href='/teacher/';
				}
		
		});
});
</script>
<script type="text/javascript">
$(function(){
  $('#search_but').click(function(){
    var q=$('#q').val();
        window.location.href="/CourseList.php?cateid=0&pid=0&keyword="+q;

    });
  
  });
</script>
</head>

<body>
<header>
	<div class="wrap" id="header">
    	<a href="#" id="logo"><img src="images/logo.png"></a>
        <div id="top_search_frm">
            <input type="text" id="q" placeholder="搜索您感兴趣的课">
            <input type="button" id="search_but">
            <ul id="tip">
                <li><a href="#">Android</a></li>
                <li><a href="#">JAVA</a></li>
                <li><a href="#">PHP</a></li>
            </ul>
        </div>
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
        <a href="javascript:;" id="user-box">
        	<font><?php echo $username?><br>安全退出</font>
            <span title="进入个人中心"><img src="../images/headimgurl.jpg"></span>
        </a>
        <?php
		}
		?>
    </div>
</header>

<section>
	<div id="nav" class="wrap">
    	<div id="cate">
        	<h1>全部课程</h1>
            <ul>
            	<li>
                <h2><a href="/CourseList.php?cateid=1&pid=0">ITSS·ITIL</a></h2>
                <p><a href="/CourseList.php?cateid=7&pid=6">IT服务项目经理</a><a href="/CourseList.php?cateid=12&pid=11">ITIL2011</a></p>
                <div id="right_cate">
                	<dd><h3><a href="/CourseList.php?cateid=6&pid=1">ITSS</a></h3><a href="/CourseList.php?cateid=7&pid=6">IT服务项目经理</a><a href="/CourseList.php?cateid=8&pid=6">IT服务工程师</a></dd>
                	<dd><h3><a href="CourseList.php?cateid=9&pid=1">信用管理</a></h3><a href="CourseList.php?cateid=10&pid=9">信用管理师</a></dd>
                	<dd><h3><a href="CourseList.php?cateid=11&pid=1">ITIL</a></h3><a href="/CourseList.php?cateid=12&pid=11">ITIL2011</a><a href="/CourseList.php?cateid=13&pid=11">Foundation</a></dd>
                </div>
                </li>
            	<li>
                <h2><a href="/CourseList.php?cateid=2&pid=0">移动·前端</a></h2>
                <p><a href="/CourseList.php?cateid=15&pid=14">Android</a><a href="/CourseList.php?cateid=16&pid=14">iOS</a><a href="/CourseList.php?cateid=19&pid=17">JavaScript</a></p>
                <div id="right_cate">
                	<dd><h3><a href="/CourseList.php?cateid=14&pid=2">移动开发</a></h3><a href="/CourseList.php?cateid=15&pid=14">Android</a><a href="/CourseList.php?cateid=16&pid=14">iOS</a></dd>
                	<dd><h3><a href="/CourseList.php?cateid=17&pid=2">前端开发</a></h3><a href="/CourseList.php?cateid=18&pid=17">HTML5/CSS3</a><a href="/CourseList.php?cateid=19&pid=17">JavaScript</a></dd>
                	<dd><h3><a href="/CourseList.php?cateid=20&pid=2">游戏开发</a></h3><a href="/CourseList.php?cateid=21&pid=20">Cocos2D</a></dd>
                </div>
                </li>
            	<li>
                <h2><a href="/CourseList.php?cateid=3&pid=0">后端·测试</a></h2>
                <p><a href="/CourseList.php?cateid=23&pid=22">JAVA</a><a href="/CourseList.php?cateid=25&pid=22">PHP</a><a href="/CourseList.php?cateid=30&pid=28">测试实操</a><a href="/CourseList.php?cateid=26&pid=22">Lua</a></p>
                <div id="right_cate">
                	<dd><h3><a href="CourseList.php?cateid=22&pid=3">后端开发</a></h3><a href="/CourseList.php?cateid=23&pid=22">JAVA</a><a href="/CourseList.php?cateid=24&pid=22">C/C++</a><a href="/CourseList.php?cateid=27&pid=22">数据库</a><a href="/CourseList.php?cateid=25&pid=22">PHP</a><a href="/CourseList.php?cateid=26&pid=22">Lua</a></dd>
                	<dd><h3><a href="/CourseList.php?cateid=28&pid=3">软件测试</a></h3><a href="CourseList.php?cateid=29&pid=28">软件测试基础</a><a href="/CourseList.php?cateid=30&pid=28">测试实操</a></dd>
                	<dd><h3><a href="CourseList.php?cateid=31&pid=3">大数据</a></h3><a href="/CourseList.php?cateid=32&pid=31">Docker</a><a href="/CourseList.php?cateid=33&pid=31">Hadoop</a><a href="/CourseList.php?cateid=34&pid=31">Spark</a><a href="/CourseList.php?cateid=35&pid=31">Scala</a></dd>
                	<dd><h3><a href="/CourseList.php?cateid=36&pid=3">开发工具</a></h3><a href="/CourseList.php?cateid=37&pid=36">SVN</a></dd>
                </div>
                </li>
            	<li>
                <h2><a href="/CourseList.php?cateid=4&pid=0">网络·运维</a></h2>
                <p><a href="/CourseList.php?cateid=39&pid=4">Linux</a><a href="/CourseList.php?cateid=40&pid=4">思科</a><a href="/CourseList.php?cateid=41&pid=4">华为</a></p>
                <div id="right_cate">
                	<dd><a href="/CourseList.php?cateid=38&pid=4">红帽</a><a href="/CourseList.php?cateid=39&pid=4">Linux</a><a href="/CourseList.php?cateid=40&pid=4">思科</a><a href="/CourseList.php?cateid=41&pid=4">华为</a></dd>
                </div>
                </li>
            	<li>
                <h2><a href="/CourseList.php?cateid=5&pid=0">设计·办公</a></h2>
                <p><a href="/CourseList.php?cateid=42&pid=5">设计</a><a href="/CourseList.php?cateid=43&pid=42">UI设计</a><a href="/CourseList.php?cateid=44&pid=42">CG设计</a></p>
                <div id="right_cate">
                	<dd><h3><a href="/CourseList.php?cateid=42&pid=5">设计</a></h3><a href="/CourseList.php?cateid=43&pid=42">UI设计</a><a href="/CourseList.php?cateid=44&pid=42">CG设计</a></dd>
                	<dd><h3><a href="/CourseList.php?cateid=45&pid=5">办公</a></h3><a href="/CourseList.php?cateid=46&pid=45">PowerPoint</a><a href="/CourseList.php?cateid=47&pid=45">Excel</a></dd>
                </div>
                </li>
            	<li>
                <h2><a href="/CourseList.php?cateid=48&pid=0">电商·营销</a></h2>
                <p><a href="/CourseList.php?cateid=49&pid=48">网络营销</a><a href="/CourseList.php?cateid=50&pid=48">跨境电商</a></p>
                </li>
            </ul>
        </div>
        <ul id="sNav">
        	<li><a href="index.php">首页</a></li>
        	<li><a href="CourseList.php">全部课程</a></li>
        	<li><a href="zCourseList.php">直播课</a></li>
        	<li><a href="/user/">学习中心</a></li>
        </ul>
        
        <div id="notice">
        	<ul>
            	<li><a href="#">[直播] ITSS实训基地课程</a></li>
            	<li><a href="#">[直播] ITSS实训基地课程</a></li>
            	<li><a href="#">[直播] ITSS实训基地课程</a></li>
            	<li><a href="#">[直播] ITSS实训基地课程</a></li>
            	<li><a href="#">[直播] ITSS实训基地课程</a></li>
            	<li><a href="#">[直播] ITSS实训基地课程</a></li>
            	<li><a href="#">[直播] ITSS实训基地课程</a></li>
            </ul>
            <center>
            <img src="images/code01.jpg"><br>
            关注云教育，轻松学习
            </center>
        </div>
        
        <div id="apply_video">
        	<h1>我要开课</h1>
            <ul>
            	<li><a href="#">培训机构开课</a></li>
            	<li><a href="#">个人讲师开课</a></li>
            </ul>
        </div>
    </div>
</section>

<!--banner-->
<section id="banner">
    <div id="focus">
        <ul>
            <li><a href="#" target="_blank"><img src="images/ITSS.jpg"/></a></li>
            <li><a href="#" target="_blank"><img src="images/itss01.jpg" /></a></li>
        </ul>
    </div>
</section>

<!--学习方案-->
<section>
	<div class="wrap list" id="plan">
    	<h1>根据职业目标 选择学习方案</h1>
        <ul>
        	<li>
                <a href="#">
                <img src="images/temp_1443083125329.jpg">
                <font>HTML5前端工程师</font>
                <span>23门课 / 19228人学习 / 28小时41分</span>
                <b>HTML5</b><b>CSS3</b><b>JS</b>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8//picture/school/YL_SCHEME/temp_1451027024307.png">
                <font>iOS工程师</font>
                <span>23门课 / 19228人学习 / 28小时41分</span>
                <b>HTML5</b><b>CSS3</b><b>JS</b>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8//picture/school/YL_SCHEME/temp_1448528655899.png">
                <font>UI设计师</font>
                <span>23门课 / 19228人学习 / 28小时41分</span>
                <b>HTML5</b><b>CSS3</b><b>JS</b>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8//picture/school/YL_SCHEME/temp_1453451340055.png">
                <font>JAVA SE工程师</font>
                <span>23门课 / 19228人学习 / 28小时41分</span>
                <b>HTML5</b><b>CSS3</b><b>JS</b>
                </a>
            </li> 
        </ul>
    </div>
</section>

<section>
	<div id="index_list" class="wrap list">
    	<h1>ITSS·ITIL <a href="#">更多 ></a></h1>
        <ul>
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/182/1437640810423.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/252/1437379962653.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/714/1452741470871.png" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/42/1461814294044.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        </ul>
    </div>
</section>

<section>
	<div id="index_list" class="wrap list">
    	<h1>移动·前端 <a href="#">更多 ></a></h1>
        <ul>
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/182/1437640810423.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/252/1437379962653.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/714/1452741470871.png" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/42/1461814294044.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        </ul>
    </div>
</section>

<section>
	<div id="index_list" class="wrap list">
    	<h1>ITSS·ITIL <a href="#">更多 ></a></h1>
        <ul>
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/182/1437640810423.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/252/1437379962653.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/714/1452741470871.png" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/42/1461814294044.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        </ul>
    </div>
</section>

<section>
	<div id="index_list" class="wrap list">
    	<h1>后端·测试 <a href="#">更多 ></a></h1>
        <ul>
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/182/1437640810423.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/252/1437379962653.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/714/1452741470871.png" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/42/1461814294044.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        </ul>
    </div>
</section>

<section>
	<div id="index_list" class="wrap list">
    	<h1>网络·运维 <a href="#">更多 ></a></h1>
        <ul>
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/182/1437640810423.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/252/1437379962653.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/714/1452741470871.png" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/42/1461814294044.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        </ul>
    </div>
</section>


<section>
	<div id="index_list" class="wrap list">
    	<h1>设计·办公 <a href="#">更多 ></a></h1>
        <ul>
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/182/1437640810423.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/252/1437379962653.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/714/1452741470871.png" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/42/1461814294044.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        </ul>
    </div>
</section>

<section>
	<div id="index_list" class="wrap list">
    	<h1>电商·营销 <a href="#">更多 ></a></h1>
        <ul>
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/182/1437640810423.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/252/1437379962653.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/714/1452741470871.png" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        	<li>
                <a href="#">
                <img src="http://124.192.148.8/picture/course/42/1461814294044.jpg" width="100%">
                <font>JAVA SE工程师</font>
                <span><img src="images/user-icon.png">19228人学习 <img src="images/timer-icon.png" style="margin-left:10px;">1小时10份</span>
                <p>更新至第5节 <i>免费</i></p>
                </a>
            </li> 
        </ul>
    </div>
</section>

<section style="background:#f2f2f2; margin-top:50px;">
	<div class="wrap" id="link">
    	<h1>友情链接</h1>
        <ul>
        	<li><a href="#">中国ITSS实训基地</a></li>
        	<li><a href="#">中国ITSS实训基地</a></li>
        	<li><a href="#">中国ITSS实训基地</a></li>
        	<li><a href="#">中国ITSS实训基地</a></li>
        	<li><a href="#">中国ITSS实训基地</a></li>
        	<li><a href="#">中国ITSS实训基地</a></li>
        </ul>
    </div>
</section>

<footer>
	<div id="footer" class="wrap">
    	<img src="images/logo-w-1.png" style="float:left;">
    	<ul>
        	<li>
            <h1>关于我们</h1>
            <a href="#">云教育简介</a>
            <a href="#">免责声明</a>
            <a href="#">联系方式</a>
            <a href="#">推广联盟</a>
            </li>
        	<li>
            <h1>帮助中心</h1>
            <a href="#">会员权益</a>
            <a href="#">如何观看</a>
            <a href="#">忘记密码</a>
            <a href="#">常见问题</a>
            </li>
        	<li>
            <h1>商务合作</h1>
            <a href="#">渠道合作</a>
            <a href="#">讲师合作</a>
            </li>
        </ul>
        <div style="float:right; font:13px/25px '微软雅黑'; color:#fff; text-align:center;"><img src="images/code01.jpg"><br>关注云教育微信</div>
    </div>
</footer>
</body>
</html>
