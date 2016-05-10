<?php
include_once("inc/config.php");
include_once("inc/chklogin.php");

$str='';
$sql="select 
	it_course.id, 
	it_course.title, 
	(case it_course.isShow when '0' then '离线' else '在线' end) as a, 
	it_course_video_time.b_time,
	it_course_video_time.e_time,
	it_course_video_time.webnum,
	it_course_video_time.teacherToken
	from it_course
	left join it_course_video_time on it_course_video_time.courserid=it_course.id 
	where it_course.teacher_id='$userid' and it_course.genre=1
	order by it_course.id desc
	";
$rs=$db->query($sql);
while($row=$rs->fetch(PDO::FETCH_ASSOC)){
      $str.='<tr>';
      $str.='  <td height="30" align="center"><input type="checkbox" value="'.$row['id'].'"></td>';
      $str.='  <td>'.$row["title"].'</td>';
      $str.='  <td align="center">'.$row["b_time"].'</td>';
      $str.='  <td align="center">'.$row["e_time"].'</td>';
      $str.='  <td align="center">'.$row["a"].'</td>';
      $str.='  <td align="center"><a href="javascript:;" id="teacher" data-id="'.$row['webnum'].'" data-pwd="'.$row['teacherToken'].'">开始上课</a></td>';
      $str.='</tr>';
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('body #teacher').click(function(){
		
		})
	});
</script>
<link href="../css/style0509.css" rel="stylesheet" type="text/css">
<style>
body{background:#fafafa;}
</style>
</head>

<body>
<?php
include_once("../inc/new_header.php");
?>
<table width="100%" border="0" cellspacing="20" cellpadding="0" class="wrap" id="teacher_box">
  <tr>
    <td width="300" valign="top" class="menu">
	<h1>课程管理</h1>
	<a href="index.php">点播课程</a>
	<a href="zVedio.php" class="on">直播课程</a>
	<h1 style="background-position:20px -20px;">订单管理</h1>
    <a href="order.php">已完成</a>
    <a href="order-1.php">待付款</a>
    <a href="order-2.php">已失效</a>
	<h1 style="background-position:20px -53px">结算中心</h1>
    <a href="withdraw.php">申请提现</a>
    <a href="settlement.php">结算管理</a>
	<h1 style="background-position:20px -83px;">个人设置</h1>
    <a href="info.php">基本信息</a>
    <a href="bindAccount.php">账号安全</a>
    </td>
    <td valign="top" class="content">
    <h2>直播课程</h2>
    <div id="sNav">
    	<a href="zVedio_add.php">创建直播课程</a>
    </div>
    <table width="100%" border="0" cellspacing="1" cellpadding="3" id="list">
      <tr>
        <th>选择</th>
        <th>课程名称</th>
        <th>开始时间</th>
        <th>结束时间</th>
        <th>状态</th>
        <th>操作</th>
      </tr>
      <?php echo $str;?>
    </table>
    </td>
  </tr>
</table>
<iframe id="gensee" src="" width="880" height="300" frameborder="0"></iframe>
</body>
</html>