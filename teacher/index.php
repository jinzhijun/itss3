<?php
include_once("inc/config.php");
include_once("inc/chklogin.php");

$str='';
$sql="SELECT it_course.id,it_course.title,it_course.teacher_id,(CASE it_course.isShow WHEN '0' THEN '未审核' ELSE '审核通过' END) AS a,it_course.price,(SELECT count(*) FROM it_course_video WHERE it_course_video.course_id=it_course.id AND it_course_video.url!='') AS num FROM it_course WHERE it_course.teacher_id='$userid' AND genre= '0' ORDER BY it_course.id DESC";
$rs=$db->query($sql);
while($row=$rs->fetch(PDO::FETCH_ASSOC)){
      $str.='<tr>';
      $str.='  <td height="30" align="center"><input type="checkbox" value="'.$row['id'].'"></td>';
      $str.='  <td align="center">'.$row["title"].'</td>';
      $str.='  <td align="center">&yen;'.$row["price"].'</td>';
      $str.='  <td align="center">'.$row["num"].'</td>';
      $str.='  <td align="center">'.$row["a"].'</td>';
      if ($row['a'] == '未审核') {
        $str.='  <td align="center"><a href="video_edit.php?cid='.$row['id'].'">编辑</a> | <a href="javascript:;" id="upload">上传视频</a></td>';
      }else{
        $str.='  <td align="center"><a href="javascript:;" id="upload">上传视频</a></td>';
      }
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
  $('body #edit').click(function(){
    var number=$(this).attr("c_id"),
      alert(number);
    });

  $('body #upload').click(function()

      window.location.href='info.php';

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
	<a href="index.php" class="on">点播课程</a>
	<a href="zVedio.php">直播课程</a>
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
    <h2>点播课程</h2>
    <div id="sNav">
      <a href="video_add.php">创建点播课程</a>
    </div>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
      <tr>
        <th>选择</th>
        <th>课程名称</th>
        <th>价格</th>
        <th>课时</th>
        <th>状态</th>
        <th>操作</th>
      </tr>
      <?php 
      if ($rs) {
        echo "$str";
      }else{
      ?>
      <tr>
        <td height="80" colspan="5" align="center">暂无数据</td>
      </tr>
      <?php
        }
      ?>
    </table>

    </td>
  </tr>
</table>

</body>
</html>