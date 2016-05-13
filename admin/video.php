<?php
include "inc/config.php";
include "inc/chk.php";
$menu=$_GET['menu'];
$keyword=$_GET['keyword'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>管理中心</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('#but').click(function(){
		var keyword=$('#keyword').val();
		window.location.href='video.php?menu=<?php echo $menu?>&keyword='+keyword;
		});

		$('body #show').click(function(){
		var cid=$(this).attr("data-id");
			
		$.ajax({
			url:"json/show.php",
			data:{action:"show",cid:cid},
			dataType:"json",
			type:"post",
			success: function(e){
				if(e.success==0){
					alert(e.msg);
					location.reload();
					}
				}
			});
		});

		$('body #N_show').click(function(){
		var cid=$(this).attr("data-id");
			
		$.ajax({
			url:"json/show.php",
			data:{action:"N_show",cid:cid},
			dataType:"json",
			type:"post",
			success: function(e){
				if(e.success==0){
					alert(e.msg);
					location.reload();
					}
				}
			});
		});

	});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
#list{background:#ddd; margin-top:20px;}
#list th{background:#1c2b36; color:#fff;}
#list tr{background:#fff;}
#list tr:hover{background:#f1f1f1;}
#list *{padding:4px;}
</style>
</head>

<body>
<?php include 'inc/menu.php';?>
<input type="text" id="keyword" placeholder="关键词"><input type="button" value="查询" id="but">
<a href="course_add.php?menu=10&genre=0">添加</a>
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
  <tr>
    <th>选择</th>
    <th>课程名称</th>
    <th>课时</th>
    <th>课程价格</th>
    <th>讲师</th>
    <th>状态</th>
    <th>时间</th>
    <th>操作</th>
  </tr>
<?php
$Page_size=15;
$sql="select it_course.id, it_course.title, it_course.price, it_user_teacher.name, case it_course.isShow when '0' then '离线' else '在线' end, it_course.addtime,(select count(*) from it_course_video where course_id=it_course.id and url!='') as num
	  from it_course
	  left join it_user_teacher on it_course.teacher_id=it_user_teacher.id
	  where it_course.title like '%$keyword%' and it_course.genre='0'
	  order by it_course.id desc";
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
?>
  <tr>
    <td align="center"><input type="checkbox" id="cid" value="<?php echo $row[0]?>"></td>
    <td><?php echo $row[1]?></td>
    <td align="center"><?php echo $row[6]?>课时</td>
    <td align="center">&yen; <?php echo $row[2]?></td>
    <td align="center"><?php echo $row[3]?></td>
    <td align="center"><?php echo $row[4]?></td>
    <td align="center"><?php echo $row[5]?></td>
    <td align="center"><input type="button" id="show" data-id="<?php echo $row[0]?>" value="上架"></input>|<input type="button" data-id="<?php echo $row[0]?>" id="N_show" value="下架"></input>|编辑 | <a href="video_add.php?menu=<?php echo $menu?>&courseId=<?php echo $row[0]?>">上传视频</a></td>
  </tr>
<?php
}
    mysql_free_result($rs);
	
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$url='video.php?menu='.$menu.'&keyword='.$keyword;
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
  <tr>
    <td colspan="8"><?php echo $key;?></td>
  </tr>
</table>

</body>
</html>