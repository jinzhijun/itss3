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
<script src="./js/jquery-1.11.3.min.js"></script>
<link href="../css/style0509.css" rel="stylesheet" type="text/css">
<style>
body{background:#fafafa;}
</style>
</head>

<body>
<?php
  include_once("../inc/new_header.php");
  $sql = "SELECT * FROM it_user_money WHERE uid = $userid";
  $stmt_price = $db->query($sql);
  $result = $stmt_price->fetch(PDO::FETCH_ASSOC);

  $sql_profit = "SELECT id,money,addtime,(CASE status WHEN '0' THEN '等待审核' ELSE '审核通过' END) AS sta FROM it_user_cash_apply WHERE uid = $userid";
  $stmt_profit = $db->query($sql_profit);
  $result_profit = $stmt_profit->fetch(PDO::FETCH_ASSOC);
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
    <a href="withdraw.php" class="on">申请提现</a>
    <a href="settlement.php">结算管理</a>
	<h1 style="background-position:20px -83px;">个人设置</h1>
    <a href="info.php">基本信息</a>
    <a href="bindAccount.php">账号安全</a>
    </td>
    <td valign="top" class="content">
    <h2>提现申请</h2>
    <div id="frm">
    可提现金额：<span id="toMoney" value="<?php echo $result['money'];?>"><?php echo $result['money']; ?></span>元<input type="text" id="inMoney" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')" ><input id="check_money"  type="button" value="提现">
    </div>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
          <tr>
            <th>提现编号</th>
            <th>提现金额</th>
            <th>申请时间</th>
            <th>状态</th>
          </tr>
          <?php 
            if($result_profit){
          ?>
          <tr>
            <td height="40" align="center"><?php echo $result_profit['id'];?></td>
            <td height="40" align="center"><?php echo $result_profit['money'];?></td>
            <td height="40" align="center"><?php echo $result_profit['addtime'];?></td>
            <td height="40" align="center">&yen; <?php echo $result_profit['sta'];?></td>
          </tr>
          <?php
            }else{
          ?>
          <tr>
            <td height="80" colspan="6" align="center">暂无提现记录</td>
          </tr>
           <?php
            }
            ?>

        </table>   
        </td>
  </tr>
</table>
<script type="text/javascript">
  // 限制input只输入数字
  // function IsNum(e){
  //   var k = window.event ? e.keyCode : e.which;
  //   if (((k >=48) && (k<=57)) || k == 8 || k ==0) {

  //   }else{
  //     if (window.event) {
  //       window.event.returnValue = false;
  //     }else{
  //       e.preventDefaulr();
  //     }
  //   }
  // }
	$("#check_money").click(function(){
    // var totalMoney = $('#toMoney').val();
		var totalMoney = <?php echo $result['money'];?>;
    var in_money   = $('#inMoney').val();
    if (!isNaN(in_money)) {
      if (totalMoney<in_money) {
        alert("金额不足");
        return false;
      }else{
        $.ajax({
          url:'json/cash.php',
          data:{in_money:in_money,uid:<?php echo $userid;?>},
          type:"post",
          dataType:"json",
          success: function(e){
            if (e.success == 0) {
              alert(e.msg);
            }
          }
        });
      }      
    }else{
      alert("请填写正确的金额");
    }


	});
</script>
</body>
</html>