<?php
include "inc/config.php";
include "inc/chk.php";
$frm=$_GET['frm'];
$videoID=$_GET['videoID'];

$action=$_POST['action'];
if($action=='add'){//添加
	$menu=$_POST['menu'];
	$courseId=$_POST['courseId'];
	$title=$_POST['title'];
	$url=$_POST['url'];
	
	$sql="select count(*) from it_course_video where course_id='$courseId'";
	$rs=mysql_query($sql);
	$row=mysql_fetch_array($rs);
	$sort=$row[0]+1;
	
	$sql="insert into it_course_video(course_id,title,url,sort,addtime)values('$courseId','$title','$url','$sort',NOW())";
	mysql_query($sql);
	
	header("Location: video_add.php?menu=".$menu."&courseId=".$courseId);
}elseif($action=='edit'){//编辑
	$menu=$_POST['menu'];
	$courseId=$_POST['courseId'];
	$title=$_POST['title'];
	$url=$_POST['url'];
	$videoID=$_POST['videoID'];
	
	$sql="update it_course_video set title='$title', url='$url' where id='$videoID' and course_id='$courseId'";
	mysql_query($sql);
	
	header("Location: video_add.php?menu=".$menu."&courseId=".$courseId);
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>管理中心</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script>
function check(form){
	if(form.title.value==''){
		alert('目录不能为空')
		return false;
		}
	}
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
label{display:inline-block; margin-right:10px;}

#list{background:#ddd; margin-top:20px;}
#list th{background:#1c2b36; color:#fff;}
#list tr{background:#fff;}
#list tr:hover{background:#f1f1f1;}
#list *{padding:4px;}

</style>
</head>

<body>
<?php include 'inc/menu.php';?>
<?php
$courseId=$_GET['courseId'];
$menu=$_GET['menu'];
$sql="select title from it_course where id='$courseId'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	echo $row[0]."<br><br>";
}
if(empty($frm)){
?>
<form action="video_add.php" method="post" name="frm" id="frm">
<input type="hidden" name="action" value="add">
<input type="hidden" name="courseId" value="<?php echo $courseId?>">
<input type="hidden" name="menu" value="<?php echo $menu?>">
<label>目录：<input name="title" type="text" size="50"></label>
<label>路径：<input type="text" name="url"></label>
<label><input type="file"></label>
<input type="submit" value="添加" onClick="return check(this.form)">
</form>
<?php
}else{
$sql="select * from it_course_video where id='$videoID'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$title=$row['title'];
	$url=$row['url'];
}
?>
<form action="video_add.php" method="post" name="frm" id="frm">
<input type="hidden" name="action" value="edit">
<input type="hidden" name="videoID" value="<?php echo $videoID?>">
<input type="hidden" name="courseId" value="<?php echo $courseId?>">
<input type="hidden" name="menu" value="<?php echo $menu?>">
<label>目录：<input name="title" type="text" value="<?php echo $title?>" size="50"></label>
<label>路径：<input type="text" name="url" value="<?php echo $url?>"></label>
<label><input type="file"></label>
<input type="submit" value="编辑" onClick="return check(this.form)">
</form>
<?php }?>
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
  <tr>
    <th>标题</th>
    <th>视频地址</th>
    <th>操作</th>
  </tr>
<?php
$sql="select * from it_course_video where course_id='$courseId' order by id asc";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
?>
  <tr>
    <td><?php echo $row['title']?></td>
    <td><?php echo $row['url']?></td>
    <td align="center">
    <a href="#">上移</a>
    <a href="#">下移</a>
    <a href="?menu=<?php echo $menu?>&courseId=<?php echo $courseId?>&videoID=<?php echo $row['id']?>&frm=edit">编辑</a>
    <a href="#">删除</a>
    </td>
  </tr>
<?php
}
mysql_close();
?>
</table>

</body>
</html>