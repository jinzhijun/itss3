<?php
include '../inc/config.php';
include "../inc/user_info.php";
require_once('../inc/cart.class.php');
$cart = new CartAPI();
$cart->RemoveAll();
$orderid=$_GET['orderid'];
$sql="select * from it_order where orderid='$orderid'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$price=$row['price'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>收银台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style>
body{background:#fff !important; margin-top:80px;}
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
</style>
</head>

<body>
<?php include '../inc/header_1.php';?>
<section>
	<div class="wrap pay">
    <h1>请在1小时内完成支付<br>超出1小时再支付可能导致购买失败，需重新下单购买</h1>
    <div>实付金额：<b>&yen; <?php echo $price?></b></div>
    <div class="pay-select">
    	<form name="alipayment" action="../alipay/alipayapi.php" method="post">
        <input type="hidden" name="WIDseller_email" value="sunhongjun@nc-info.com" />
        <input type="hidden" name="WIDout_trade_no" value="<?php echo $orderid?>" />
        <input type="hidden" name="WIDsubject" value="云教育课程费" />
        <input type="hidden" name="WIDtotal_fee" value="<?php echo $price?>" />
        <span>支付方式</span>
        <ul>
            <li class="on" id="alipay"><img src="../images/pay_select.png"></li>
        </ul>
    	<p>
        <input type="submit" value="去支付" id="payBut"><font>下单后，请在1小时内完成支付。超出1小时再支付可能导致购买失败，需重新下单购买。</font>
        <label><input type="checkbox" checked>我已经阅读并同意 <a href="#">《云教育用户付费协议》</a></label>
        </p>
        </form>
    </div>
    </div>
</section>
</body>
</html>