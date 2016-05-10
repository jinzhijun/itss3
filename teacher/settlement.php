<?php
include_once("inc/config.php");
include_once("inc/chklogin.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
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
	<a href="zVedio.php">直播课程</a>
	<h1 style="background-position:20px -20px;">订单管理</h1>
    <a href="order.php">已完成</a>
    <a href="order-1.php">待付款</a>
    <a href="order-2.php">已失效</a>
	<h1 style="background-position:20px -53px">结算中心</h1>
    <a href="withdraw.php">申请提现</a>
    <a href="settlement.php" class="on">结算管理</a>
	<h1 style="background-position:20px -83px;">个人设置</h1>
    <a href="info.php">基本信息</a>
    <a href="bindAccount.php">账号安全</a>
    </td>
    <td valign="top" class="content">
    <h2>结算管理</h2>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
          <tr>
            <th>订单编号</th>
            <th>结算金额</th>
            <th>状态</th>
            <th>结算时间</th>
            <th>操作</th>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
    </td>
  </tr>
</table>

</body>
</html>