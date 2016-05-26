<?php
include_once("inc/pdo.php");
include_once("inc/chklogin.php");
include_once("../page.class.php");
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
  $sql_uid = "SELECT uid FROM it_user_teacher WHERE uid = $userid";
  $data_uid = $db_pdo->query($sql_uid);
  $result_uid = $data_uid->fetch(PDO::FETCH_NUM);
  $uid = $result_uid['0'];
  $sql = "SELECT count(*) FROM it_order_item WHERE teacher_id = $uid AND status = 1";
  $count = $db_pdo->query($sql);
  $count_1 = $count->fetchAll(PDO::FETCH_NUM);
  $total = $count_1[0][0];
  $num = 5;
  $page = new Page($total,$num);
  $sql_1 = "SELECT * FROM it_order_item WHERE teacher_id = $uid AND status = 1 {$page->limit}";
  $result = $db_pdo->query($sql_1,PDO::FETCH_ASSOC);
?>
<table width="100%" border="0" cellspacing="20" cellpadding="0" class="wrap" id="teacher_box">
  <tr>
    <td width="300" valign="top" class="menu">
	<h1>课程管理</h1>
	<a href="index.php">点播课程</a>
	<a href="zVedio.php">直播课程</a>
	<h1 style="background-position:20px -20px;">订单管理</h1>
    <a href="order.php">已完成</a>
    <a href="order-1.php" class="on">待付款</a>
    <a href="order-2.php">已失效</a>
	<h1 style="background-position:20px -53px">结算中心</h1>
    <a href="withdraw.php">申请提现</a>
    <a href="settlement.php">结算管理</a>
	<h1 style="background-position:20px -83px;">个人设置</h1>
    <a href="info.php">基本信息</a>
    <a href="bindAccount.php">账号安全</a>
    </td>
    <td valign="top" class="content">
    <h2>订单管理</h2>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
          <tr>
            <th>订单编号</th>
            <th>购买课程</th>
            <th>金额</th>
            <th>购买时间</th>
          </tr>
          <?php
            $i = 0;
            while($data = $result->fetch()) {
              $i++;
          ?>
          <tr>
          <td  align="center"><?php echo $data['orderid']?></td>
          <td  align="center"><?php echo $data['title']?></td>
          <td  align="center"><?php echo $data['price']?></td>
          <td  align="center"><?php echo $data['addtime']?></td>
          </tr>
          <?php
              }
              if(empty($i)){
            ?>
            <td height="80" colspan="6" align="center">暂无数据</td>
        </table>
          <?php
              }else{
                  echo "</table>";
                  echo $page->fpage();
              }
          ?>

    </td>
  </tr>
</table>

</body>
</html>