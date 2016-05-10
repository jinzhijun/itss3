<?php
include "inc/config.php";
include "inc/user_info.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.login.js" type="text/javascript"></script>
<style>
body{margin:0; padding:0; background:#f8f8f8;}
*{font-size:12px; font-family:'微软雅黑';}
.wrap{width:1200px; margin:0 auto;}
ul,p{margin:0; padding:0;}
li{list-style:none;}

/*顶部*/
header{height:151px;}
#header{height:100px;}
#header .logo{float:left; margin:30px 0 0 0; display:block;}
#header button{float:right; border:0; background:red; color:#fff; height:40px; width:90px; font-size:14px; margin:30px 0 0 0; outline:none; cursor:pointer;}
#header button:hover{background:#F60;}
#nav{height:50px; border-top:#ddd solid 1px; border-right:#ddd solid 1px; background:#fff; position:relative; z-index:999;}

/*菜单*/
#nav .cate{float:left; width:225px; height:51px; background:#31a030 url(images/cate.png) 20px center no-repeat; color:#fff; margin-top:-1px; margin-right:20px;}
#nav .cate b{font:18px/48px '微软雅黑'; display:block; margin-left:50px;}
#nav .cate ul{position:absolute; top:50px; left:0; height:415px; padding-top:15px; background:rgba(0, 0, 0, 0.5); width:225px;}
#nav .cate ul li{padding:0 20px;}
#nav .cate ul li div{overflow:hidden; padding:15px 0;}
#nav .cate ul li:hover{}
#nav .cate ul li a{font:15px/20px '微软雅黑'; color:#fff; padding:0; float:none;}
#nav .cate ul li a:hover{background:none; text-decoration:underline;}
#nav .cate ul li p{margin-top:8px;}
#nav .cate ul li p a{display:inline-block; margin-right:10px; font:12px/20px '微软雅黑';}
#nav a{float:left; display:block; padding:0 20px; font:16px/49px '微软雅黑'; color:#000; text-decoration:none;}
#nav a:hover{background:#31a030; color:#fff;}
#nav #search{float:right; border:#ddd solid 1px; background:url(images/seach.png) 10px center no-repeat; height:30px; padding-left:35px; margin:8px; outline:none; width:180px; font-size:13px;}

#news{position:absolute; top:75px; right:0; background:#fff; width:224px;}
#news img{margin-bottom:10px;}
#news a{float:none; font:13px/30px '微软雅黑'; margin:0 20px; padding:0; display:block;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
#news a:hover{background:none; color:#31a030;}
#news ul{margin-top:15px; border-top:#ddd solid 1px;}
#news ul li{width:50%; float:left; padding:0; margin:0; background-color:#f8f8f8;}
#news ul li a{color:#31a030; font:16px/50px '微软雅黑'; width:80%; text-align:center; padding:0; margin:0; padding-left:20%;}
#news ul li a:hover{ text-decoration:underline;}

/*幻灯片*/
#banner{margin-bottom:40px;}
#focus{width:950px;height:430px;overflow:hidden;position:relative; margin:0 auto;}
#focus ul{height:430px;position:absolute;}
#focus ul li{float:left;width:950px;height:430px;overflow:hidden;position:relative;}
#focus ul li div{position:absolute;overflow:hidden;}
#focus .btnBg{position:absolute;width:950px;height:20px;left:0;bottom:0;}
#focus .btn{position:absolute;width:930px; padding:5px 10px;right:0;bottom:20px;text-align:center;}
#focus .btn span{display:inline-block;_display:inline;_zoom:1;width:10px;height:10px;_font-size:0;margin-left:5px;cursor:pointer;background:#fff;}
#focus .btn span.on{background:#fff; height:15px;}
#focus .preNext{width:45px;height:100px;position:absolute;top:150px;background:url(images/sprite.png) no-repeat 0 0;cursor:pointer;}
#focus .pre{left:130px;}
#focus .next{right:130px;background-position:right top;}


/*课程列表样式*/
.course ul{text-align:justify;}
.course ul li{display:inline-block; overflow:hidden; margin-left:24px;}
.course ul li *{display:block;}
.course ul li:last-child{height:0;}
.course ul li a{color:#000; text-decoration:none;}
.course ul li a:hover{color:#39a030;}
.course ul li span{overflow:hidden;}
.course ul li span img{height:100%; width:100%;}
.course ul li b{white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}


#free_course ul li{width:220px;}
#free_course ul li span{width:220px; height:145px;}
#free_course ul li b{font:14px/25px '微软雅黑';}
#free_course ul li font{color:#999; font:12px/20px '微软雅黑';}

#hot_course h1{font:25px/30px '微软雅黑'; display:block;}
#hot_course h1 a{float:right; background:url(images/more.png) right center no-repeat; padding-right:20px; font-size:14px; color:#444; text-decoration:none;}
#hot_course h1 a:hover{color:#000; text-decoration:underline;}
#hot_course .left,#hot_course .right{float:left; width:220px; height:480px;}
#hot_course .left img,#hot_course .right img{width:100%;}
#hot_course .center{float:left; width:740px; height:480px; margin:0 10px;}
#hot_course ul li{width:220px; margin-left:22px;}
#hot_course ul li span{width:220px; height:145px;}
#hot_course ul li b{font:14px/25px '微软雅黑';}
#hot_course ul li font{color:#999; font:12px/20px '微软雅黑';}
#hot_course ul li strong{color:red; font:20px/40px '微软雅黑';}

#teacher{overflow:hidden;}
#teacher h1{font:25px/30px '微软雅黑'; display:block;}
#teacher h1 a{float:right; background:url(images/more.png) right center no-repeat; padding-right:20px; font-size:14px; color:#444; text-decoration:none;}
#teacher h1 a:hover{color:#000; text-decoration:underline;}
#teacher ul li{width:20%; float:left; }
#teacher ul li a{margin:1px; display:block; height:230px; overflow:hidden; position:relative;}
#teacher ul li img{width:100%;}
#teacher ul li p{position:absolute; left:0; bottom:0; width:100%; height:30px; background:rgba(0, 0, 0, 0.5);}
#teacher ul li p b{font:18px/30px '微软雅黑'; color:#fff; padding:0 10px;}
#teacher ul li p font{font:12px/30px '微软雅黑'; color:#fff;}

/*友情链接*/
#weblink{background:#eee; overflow:hidden; margin-top:30px;}
#weblink h1{font:20px/50px '微软雅黑'; border-bottom:#ddd solid 1px; overflow:hidden;}
#weblink ul{text-align:justify; display:block; overflow:hidden; width:100%;}
#weblink ul li{display:inline-block; width:120px; height:60px; margin-bottom:10px;}
#weblink ul li img{border:#ddd solid 1px;}

/*底部*/
footer{background:#292b30; height:200px;}
footer div{color:#ccc; font:14px/30px '微软雅黑'; position:relative;}
footer div span{display:inline-block; margin-right:40px; font-size:14px;}
footer ul{padding:30px 0 20px 0; display:block; width:100%; overflow:hidden;}
footer ul li{float:left; margin-right:40px;}
footer ul li a{color:#ccc; text-decoration:none; font-size:14px;}
footer ul li a:hover{color:#fff;}
footer .wx{position:absolute; top:30px; right:0; text-align:center; color:#ccc; line-height:16px;}
</style>
<link href="css/login.css" rel="stylesheet" type="text/css">
<script>
$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	var bgColor=['#082f96','#bcbfc4','#ffc701'];
	
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
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
	}
	
	
	//顶部分类
	$('#nav .cate li').hover(function(){
		$(this).find('a').css({color:'#000'});
		$(this).find('p').find('a').css({color:'#444'});
		},function(){
			$(this).find('a').css({color:'#fff'});
			$(this).find('p').find('a').css({color:'#fff'});
			})
			
	$('body .course a').hover(function(){
		$(this).find('span').find('img').animate({width:'106%',height:'110%',margin:'-5%'},600)
		},function(){
			$(this).find('span').find('img').animate({width:'100%',height:'100%',margin:'0'},600)
			});
	
	$('#header button').click(function(){
		$('body').login();
		});
	$('#search').keyup(function(e){
		if(e.keyCode==13){
			window.location.href='find.php?keyword='+$(this).val();
			}
		});
		
	$.ajax({
		type: "post", 
		url: "json/menu.php",
		dataType: "json", 
		success: function(e){
			var data=e.d;
			for(var i=0; i<data.length; i++){
				var d=data[i];
				if(d.depth==0){
					$('.cate ul').append('<li><div id="c'+d.id+'"><a href="#">'+d.name+'</a><p></p></div></li>')
					}else{
					$('.cate #c'+d.parentid).find('p').append('<a href="find.php?cateid='+d.id+'&parentid='+d.parentid+'">'+d.name+'</a>')	
					}
				}
			}
		});
});
</script>

</head>

<body>

<header>
	<ul id="header" class="wrap">
    	<a href="index.php" class="logo"><img src="images/logo.png"></a>
        <button>登录/注册</button>
        <?php include "inc/user_top.php";?>
    </ul>
    <div id="nav" class="wrap">
    	<div class="cate">
        	<b>全部课程</b>
            <ul></ul>
        </div>
        <a href="index.php">首页</a>
        <a href="#">课程体系</a>
        <a href="find.php">找课程</a>
        <a href="live.php">直播</a>
        <a href="user/">学习中心</a>
        <input type="text" id="search" placeholder="搜索">
        
        <div id="news">
        	<img src="images/1.png">
            <?php
            $sql="select id,title,url from it_artical where cateid='1' order by id desc limit 5";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
				echo '<a href="'.$row[2].'" target="_blank" title="'.$row[1].'">'.$row[1].'</a>';
				}
			?>
            <ul>
            	<li><a href="live.php" style="border-right:#ddd solid 1px; background:url(images/vod.png) 15px center no-repeat;">看直播</a></li>
            	<li><a href="#" style="background:url(images/write.png) 15px center no-repeat;">做真题</a></li>
            </ul>
        </div>
    </div>
</header>

<section id="banner">
    <div id="focus">
        <ul>
            <li><a href="#" target="_blank"><img src="images/ITSS.jpg"/></a></li>
            <li><a href="#" target="_blank"><img src="images/itss01.jpg" /></a></li>
        </ul>
    </div>
</section>

<section class="wrap course" id="free_course">
	<ul>
		<li style="margin:0;"><a href="find.php?cid=1"><img src="images/mfhk.png"></a></li>
        <?php
		$str='';
        $sql="select it_course.id,it_course.title,it_course.img,it_user_teacher.name from it_course 
		      left join it_user_teacher on it_user_teacher.id=it_course.teacher_id
			  where it_course.price='0' and it_course.isShow=1 and it_course.genre=0
			  order by rand() limit 4";
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			$str.='<li><a href="course.php?id='.$row[0].'">';
			$str.='<span><img src="'.$row[2].'"></span>';
			$str.='<b>'.$row[1].'</b>';
			$str.='<font>'.$row[3].'</font>';
			$str.='</li></a>';
			}
		echo $str;
		?>
        <li></li>
    </ul>
</section>

<section class="wrap course" id="hot_course">
    <h1>畅销好课<a href="find.php?cid=2">更多</a></h1>
	<div class="left"><img src="images/itss03.jpg"></div>
    <div class="center">
	<ul>
        <?php
		$str='';
        $sql="select it_course.id,it_course.title,it_course.img,it_user_teacher.name,it_course.price from it_course 
		      left join it_user_teacher on it_user_teacher.id=it_course.teacher_id
			  where it_course.price>0 and it_course.isShow=1 and it_course.genre=0
			  order by it_course.id desc limit 0,10";
		$rs=mysql_query($sql);
		while($row=mysql_fetch_array($rs)){
			$str.='<li><a href="course.php?id='.$row[0].'">';
			$str.='<span><img src="'.$row[2].'"></span>';
			$str.='<b>'.$row[1].'</b>';
			$str.='<font>'.$row[3].'</font>';
			$str.='<strong>&yen; '.$row[4].'</strong>';
			$str.='</li></a>';
			}
		echo $str;
		?>
		<li>
			<a href="#">
			<span><img src="images/11.jpg"></span>
			<b>互联网创业者的新修炼（3集）</b>
			<font>程老师</font>
            <strong>&yen; 25.00</strong>
			</a>
		</li>
    </ul>
    </div>
    <div class="right"><img src="images/itss04.jpg"></div>
</section>

<section class="wrap" id="teacher">
  <h1>名师大咖秀<a href="#">申请加入</a></h1>
	<ul>
    	<li>
        	<a href="#">
            <img src="http://www.itss3.cn/itss/UploadFiles/AttachInfoInformation/3b6faf5f-301b-40f3-88a8-8bedc8f1c54a.jpg">
            <p><b>周平</b><font>特邀专家</font></p>
            </a>
        </li>
    	<li>
        	<a href="#">
            <img src="http://www.itss3.cn/itss/UploadFiles/AttachInfoInformation/1b6fe335-5aac-4f83-aa1b-b44fb9ac4e59.jpg">
            <p><b>宋跃武</b><font>特邀专家</font></p>
            </a>
        </li>
    	<li>
        	<a href="#">
            <img src="http://www.itss3.cn/itss/UploadFiles/AttachInfoInformation/d4d10345-5f2e-4c4e-97f6-e9334e11c349.jpg">
            <p><b>王志鹏</b><font>特邀专家</font></p>
            </a>
        </li>
    	<li>
        	<a href="#">
            <img src="http://www.itss3.cn/itss/UploadFiles/AttachInfoInformation/b162d7a0-c637-456c-9fed-0fc55544c361.jpg">
            <p><b>高波</b><font>IT专家</font></p>
            </a>
        </li>
    	<li>
        	<a href="#">
            <img src="http://www.itss3.cn/itss/UploadFiles/AttachInfoInformation/51eb07b5-fd85-4be2-81d5-830b7a1efb17.jpg">
            <p><b>姚李飞</b><font>PMP软考中高级项目经理讲师</font></p>
            </a>
        </li>
    </ul>
</section>

<section id="weblink">
	<div class="wrap">
    	<h1>友情链接</h1>
        <ul>
<?php
	$dns= 'mysql:dbname=itss3;host=localhost'; 
	$db = new PDO($dns,"itss","itss");
	$sql = 'select * from it_link';
	$result = $db->prepare($sql);
	$result->execute();
	$linkStr = '';
	while($row = $result->fetch(PDO::FETCH_NUM)){
		$linkStr.= "<li><a href='$row[3]' target='_blank'><img src='$row[2]'></a></li>\n";
	}
	echo  $linkStr;
 ?><li></li>
        </ul>
    </div>
</section>
<?php include 'inc/footer.php';?>
</body>
</html>