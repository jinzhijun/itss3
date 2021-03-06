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
<script type="text/javascript">
$(function(){

  $('#save').click(function(){
    var pass=$('#pass').val();
    var pass_1=$('#pass_1').val();
    var pass_old=$('#pass_old').val();
    var uid=$('#uid').val();
    
    if(pass==""){
      alert('密码不能为空'); return false;
      }
    if(pass_1.length < 6){
    	alert('密码至少6位');
    	return false;
    }
    if(pass_1==''){
      alert('两次密码不一致'); return false;
      }
    if(pass!==pass_1){
       alert('两次密码不一致'); return false;  
    }
    $.ajax({
      url:"json/info.php",
      data:{action:"modify",pass:pass,uid:uid,pass_old:pass_old},
      dataType:"json",
      type:"post",
		success: function(e){
			if(e.success==0){
				alert(e.msg);
        location.reload();
			}else{
				alert(e.msg);
        location.reload();
			}
		}
      });
    });

    $('#but').click(function(){
      var u_name = $('#u_name').val();
      var account = $('#account').val();

      $.ajax({
        url:"json/info.php",
        data:{action:'alipay',u_name:u_name,account:account},
        type:"post",
        dataType:"json",
        success:function(e){
          alert(e.msg);
          loaction.reload();
        }
      });
    });
  
  });
</script>

<style>
body{background:#fafafa;}
</style>
</head>

<body>
<?php
include_once("../inc/new_header.php");
$sql_pay = "SELECT * FROM it_user_alipay WHERE uid = $userid";
$stmt_pay = $db->query($sql_pay);
$result = $stmt_pay->fetch(PDO::FETCH_ASSOC);
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
    <a href="settlement.php">结算管理</a>
	<h1 style="background-position:20px -83px;">个人设置</h1>
    <a href="info.php">基本信息</a>
    <a href="bindAccount.php" class="on">账号安全</a>
    </td>
    <td valign="top" class="content">
    <h2>账号安全</h2>
    <table width="100%" border="0" cellspacing="5" cellpadding="0" id="userinfo">
    <tr>
    <td width="100" align="left">
   旧密码：
    </td>
    <td width="100" align="left">
        <input type="password" id="pass_old" name="pass_old">
    </td>
    </tr>    
    <tr>
    <td width="100" align="left">
   新密码：
    </td>
    <td width="100" align="left">
        <input type="password" id="pass_1" name="pass_1">
    </td>
    </tr>
    <tr>
        <td width="100" align="left">
   确认新密码：
    </td>
    <td width="100" align="left">
        <input type="hidden" id="uid" name="uid" value="<?php echo $username;?>">
        <input type="password" id="pass" name="pass">
    </td>
    </tr>
    <tr>
         <td>&nbsp;</td>
        <td><input type="button" value="提交" id="save"></td>
    </tr>
    </table>
    <table width="100%" border="0" cellspacing="5" cellpadding="0" id="useaccount">
      <tr>
        <td width="100" align="left">
          姓名:
        </td>
        <td width="100" align="left">
          <input type="text" name="u_name" id="u_name" value="<?php echo $result['name'];?>">
        </td>
      </tr>
      <tr>
        <td width="100" align="left">
          支付宝帐号:
        </td>
        <td width="100" align="left">
          <input type="text" name="account" id="account" value="<?php echo $result['alipay'];?>">
        </td>
      </tr>
      <tr>
        <td>
          <input type="button" id="but" value="确认">
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>

</body>
</html>
