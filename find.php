<?php
include 'inc/config.php';
include 'inc/user_info.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.lazyload.js" type="text/javascript"></script>
<script src="js/jquery.login.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){	
	$('header button').click(function(){
		$('body').login();
		});
		
	$('body .course a').hover(function(){
		$(this).find('span').find('img').animate({width:'106%',height:'106%',margin:'-3%'})
		},function(){
			$(this).find('span').find('img').animate({width:'100%',height:'100%',margin:'0'})
			});
			
	$.ajax({
		type: "post", 
		url: "json/menu.php",
		dataType: "json", 
		success: function(e){
			var data=e.d;
			for(var i=0; i<data.length; i++){
				var d=data[i];
				if(d.parentid==0){
					$('#cateSearch ul').append('<li id="m'+d.id+'"><a href="#">'+d.name+'</a></li>')
					$('#cateSearch #sNav').append('<p id="c'+d.id+'"></p>');
					}else{
					$('#cateSearch #c'+d.parentid).append('<a href="?cateid='+d.id+'&parentid='+d.parentid+'">'+d.name+'</a>')
					}
				}
				
			$('#cateSearch li').click(function(){
				var index=$(this).index();
				$('#cateSearch li').removeClass('on');
				$(this).addClass('on')
				$('#sNav p').removeClass('on').eq(index).addClass('on');
				});
			$('#cateSearch #m<?php echo $_GET['parentid']?>').click();
			}
		});
	
	$('#courseTop h2').click(function(){
		var index=$(this).index();
		$('#courseTop h2').removeClass('h2on').eq(index).addClass('h2on');
		$('#courseTop div').removeClass('tabon').eq(index).addClass('tabon');
		});
	});
</script>
<style>
#cateSearch{margin-top:30px; border:#ddd solid 1px; overflow:hidden; background:#fff;}
#cateSearch ul{height:60px; border-bottom:#ddd solid 1px; background:#f8f8f8;}
#cateSearch ul li{padding:20px; float:left;}
#cateSearch ul li a{font-size:15px; display:block; padding:0 10px; color:#000; text-decoration:none;}
#cateSearch ul li a:hover{color:#31a030;}
#cateSearch ul li.on{background:url(images/find.png) bottom center no-repeat; margin-top:1px;}
#cateSearch ul li.on a{color:#31a030;}
#cateSearch #sNav p{padding:20px; font-size:14px; color:#666; display:none;}
#cateSearch #sNav p a{font-size:14px; color:#666; display:inline-block; margin-right:15px; text-decoration:none;}
#cateSearch #sNav p a:hover{color:#000;}
#cateSearch #sNav p.on{display:block;}

#find{padding-top:30px; overflow:hidden; margin-bottom:30px;}
#find .left{float:left; width:80%;}
#find .right{float:right; width:20%;}
#find .right ul{border:#ddd solid 1px; background:#fff; margin-bottom:30px; overflow:hidden; padding-bottom:15px;}
#find .right ul h1{font:16px/30px ''; padding:10px; border-bottom:#ddd solid 1px;}
#find .right ul h2{font:16px/30px ''; padding:10px 0; display:block; float:left; width:50%; cursor:pointer; border-bottom:#ddd solid 1px; text-align:center; margin-bottom:10px;}
#find .right ul h2:first-child{background:url(images/line.png) center right no-repeat;}
#find .right ul li{float:left; width:100%;}
#find .right ul li a{font:14px/30px ''; color:#333; text-decoration:none;display:block;white-space:nowrap; overflow:hidden; text-overflow:ellipsis; padding:0 10px;}
#find .right ul li a:hover{color:#10ae58;}
#find .right ul li a i{display:inline-block; margin-right:15px; font-size:14px; color:#666;}

#find .right ul .tab{display:none;}
#find .right ul .tabon{display:block;}
#find .right ul .h2on{color:#10ae58;}

/*课程列表样式*/
.course ul{text-align:justify;}
.course ul li{display:inline-block; overflow:hidden;}
.course ul li *{display:block;}
.course ul li:last-child{height:0;}
.course ul li a{color:#000; text-decoration:none;}
.course ul li a:hover{color:#39a030;}
.course ul li span{overflow:hidden;}
.course ul li span img{height:100%; width:100%;}
.course ul li b{white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}

#banner{margin-bottom:20px;}

#list ul li{width:220px; float:left; margin:0 20px 35px 0;}
#list ul li span{width:220px; height:145px;}
#list ul li b{font:14px/25px '微软雅黑';}
#list ul li font{color:#999; font:12px/20px '微软雅黑';}
#list ul li strong{color:red; font:13px/20px '微软雅黑';}

#page{width:100%; float:left; text-align:center;}
#page *{ display:inline-block; margin: 0 5px;}

#video_list h1{ background:url(images/icon1.jpg) 80px center no-repeat; }
#teacher_list a img{width:50px; height:50px; float:left; margin-right:10px;}
#teacher_list a span{display:block; float:left; line-height:20px !important; color:#999;}
#teacher_list a span b{font:15px/20px '微软雅黑'; color:#000;}
#teacher_list h1{margin-bottom:10px;}
</style>
</head>

<body>
<?php include 'inc/header.php';?>

<section id="cateSearch" class="wrap">
	<ul>
    	<li class="on"><a href="#">全部</a></li>
    </ul>
    <div id="sNav">
    <p class="on">请选择相关分类...</p>
    </div>
</section>

<section id="find" class="wrap">
	<div class="left course" id="list">
    	<div id="banner"><img src="images/3.png"></div>
    	<ul>
<?php
$Page_size=28;
$keyword=$_GET['keyword'];
$cid=$_GET['cateid'];
$sql="select it_course.id, it_course.title, it_course.img, it_course.price, it_user_teacher.name
	  from it_course
	  left join it_user_teacher on it_course.teacher_id=it_user_teacher.id";
$sql.=" where it_course.title like '%$keyword%' and it_course.genre='0' ";
if(!empty($cid)) $sql.=" and cateid='$cid'";

if($cid==2){
	$sql.="and it_course.price>0 ";
}elseif($cid==1){
	$sql.="and it_course.price=0 ";
}
$sql.="order by it_course.id desc";
$result=mysql_query($sql); 
$count = mysql_num_rows($result); 
$page_count = ceil($count/$Page_size);
	
$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 
	
	//判断当前页码 
if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
}else { 
	$page=$_GET['page']; 
}
$offset=$Page_size*($page-1);
$sql.=" limit $offset,$Page_size";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$str='';
	$str.='<li>';
	$str.='<a href="course.php?id='.$row[0].'" title="'.$row['title'].'">';
	$str.='<span><img src="'.$row['img'].'"></span>';
	$str.='<b>'.$row['title'].'</b>';
	$str.='<font>'.$row['name'].'</font>';
	if($row['price']==0){
		$str.='<strong>免费</strong>';
		}else{
			$str.='<strong>&yen; '.$row['price'].'</strong>';
			}
	$str.='</a>';
	$str.='</li>';
	echo $str;
}
    mysql_free_result($rs);
	
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$url='find.php?cid='.$menu.'&keyword='.$keyword;
	$key=''; 
	//$key.="<font>$page/$pages</font> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href='".$url."&page=1'>首页</a> "; //第一页 
	$key.="<a href='".$url."&page=".($page-1)."'>上一页</a>"; //上一页 
	}else { 
	$key.="<b>第一页</b>";//第一页 
	$key.="<b>上一页</b>"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($i=$init;$i<=$max_p;$i++){ 
	if($i==$page){ 
	$key.='<span>'.$i.'</span>'; 
	} else { 
	$key.="<a href=".$url."&page=".$i."'>".$i."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.="<a href='".$url."&page=".($page+1)."'>下一页</a>";//下一页 
	$key.="<a href='".$url."&page=".$pages."'>末页</a>"; //最后一页 
	}else { 
	$key.="<b>下一页</b>";//下一页 
	$key.="<b>末页</b>"; //最后一页 
	} 
?>
            <li></li>
        </ul>
        <div id="page"><?php echo $key?></div>
    </div>
	<div class="right">
    	<ul id="video_list">
        	<h1>讲师直播</h1>
            <?php
            $sql="select * from it_course where genre='1' limit 6";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
				echo '<li><a href="live_detail.php?id='.$row[0].'" title="'.$row['title'].'">'.$row['title'].'</a></li>';
				}
			?>
        </ul>
    	<ul id="courseTop">
        	<h2 class="h2on">免费排行</h2>
        	<h2>付费排行</h2>
            <div class="tab tabon">
            <?php
			$i=0;
            $sql="select id,title from it_course where price=0 and it_course.genre='0' order by id desc limit 10";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
				$i++;
				$i=sprintf("%02d", $i);
				if($i<4){$c='red';}else{$c='';}
				echo '<li><a href="course.php?id='.$row[0].'" title="'.$row[1].'"><i style="color:'.$c.'">'.$i.'</i>'.$row[1].'</a></li>';
				}
			?>
            </div>
            <div class="tab">
            <?php
			$i=0;
            $sql="select id,title from it_course where price>0 and it_course.genre='0' order by id desc limit 10";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
				$i++;
				$i=sprintf("%02d", $i);
				if($i<4){$c='red';}else{$c='';}
				echo '<li><a href="course.php?id='.$row[0].'" title="'.$row[1].'"><i style="color:'.$c.'">'.$i.'</i>'.$row[1].'</a></li>';
				}
			?>
            </div>
        </ul>
    	<ul id="teacher_list">
        	<h1>推荐的讲师</h1>
            <?php
            $sql="select * from it_user_teacher limit 6";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
				echo '<li><a href="#"><span><img src="'.$row['headimg'].'"><b>'.$row['name'].'</b><br>课程：10</a></span></li>';
				}
			?>
        </ul>
    </div>
</section>

<?php include 'inc/footer.php'?>
<style>
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
</style>
</body>
</html>