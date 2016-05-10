<?php
include '../inc/config.php';
include "../inc/user_info.php";
require_once('../inc/cart.class.php');
$cart = new CartAPI();
$count=$cart->CountPrice();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>确认订单</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.login.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	var userid=<?php echo $userid?>;
	
	$('#header button').click(function(){
		$('body').login();
		});
	
	var num=$('#cart_info #chk').length;
	for(var i=0; i<num; i++){
		var chk=$('#cart_info #chk').eq(i).html();
		var img=$('#cart_info #img').eq(i).html();
		var title=$('#cart_info #title').eq(i).html();
		var price=$('#cart_info #price').eq(i).html();
		$('#cart').append('<tr class="li"><td align="center" class="first">'+chk+'</td><td width="128">'+img+'</td><td  valign="top">'+title+'</td><td align="center"  valign="top">&yen; '+price+'</td><td align="center" class="last"  valign="top">'+price+'</td></tr><tr><td colspan="5">&nbsp;</td></tr>');
		}
	
	//去选
	$("#selectedAll").click(function () {//全选 
		if($(this).val()==0){
			$(this).attr('value',1)
			$("#cart #courseid").attr("checked", true);  
			}else{
				$(this).attr('value',0)
				$("#cart #courseid").attr("checked", false);  
				}
		});  
	
	$('#confirm_but').click(function(){
		if(userid==''){$('#header button').click();}//未登录用户，提示登录
		
		var i=0;
		var courseid='0';
		$('#cart #courseid').each(function(){
			if($(this).attr('checked')=='checked'){
				i++;
				courseid=courseid+','+$(this).val();
				}
			});
		if(i==0){
			alert('请购买课程');
		}else{
			$.post('confirm_order.php',{courseid:courseid},function(e){
				window.location.href='pay.php?orderid='+e;
				});
			}
		});
	});
</script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/login.css" rel="stylesheet" type="text/css">

<style>
body{background:#fff !important; margin-top:80px;}
#userTopMenu{margin-top:20px !important;}
#userTopMenu span{color:#fff;}
#cart img{width:120px; height:68px;}
#cart th{border-top:#e4e4e4 solid 2px; height:50px;}
#cart .li{background:#f8f8f8;}
#cart .li td{padding:15px 0; border-top:#e4e4e4 solid 1px; border-bottom:#e4e4e4 solid 1px;}
#cart .li .first{border-left:#e4e4e4 solid 1px;}
#cart .li .last{border-right:#e4e4e4 solid 1px;}
.title,.title font{font:20px/50px '微软雅黑'; margin:20px 0; color:#333;}
.title font{color:red;}
#confirm{border-top:#e4e4e4 solid 1px; border-bottom:#e4e4e4 solid 1px; background:#fffcef; margin:40px 0 80px 0;}
#confirm div{padding:50px 0; overflow:hidden;}
#confirm span{float:right; font:15px/30px '微软雅黑';}
#confirm font{font:18px/30px '微软雅黑'; color:red; padding-right:20px;}
#confirm div button{border:0; background:#ff8000; color:#fff; font-size:20px; width:160px; height:60px; float:right; cursor:pointer; outline:none;}
</style>
</head>

<body>
<?php include '../inc/header_1.php'?>
<section class="wrap">
<h1 class="title">参加以下课程共需要支付: <font>&yen;<?php echo $count[0]?></font></h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="cart">
  <tr>
    <th width="40"><input type="checkbox" id="selectedAll" value="0"></th>
    <th>图片</th>
    <th>课程名称</th>
    <th>单价(元)</th>
    <th>小计(元)</th>
  </tr>
  <tr><td colspan="5">&nbsp;</tr>
</table>
</section>

<section id="confirm">
	<div class="wrap">
    	<button id="confirm_but">提交订单</button><span>实付金额：<font>&yen;<?php echo $count[0]?></font></span>
    </div>
</section>

<div id="cart_info" style="display:none;">
<?php
$data=$cart->CartView();
$i=0;
if(is_array($data)){
	foreach($data as $tableName=>$table){
		foreach($table as $row){
			switch($i){
				case 0:
					echo '<div id="chk"><input type="checkbox" id="courseid" value="'.$row.'"></div>';
					break;
				case 1:
					echo '<div id="img"><img src="'.$row.'"></div>';
					break;
				case 2:
					echo '<div id="title">'.$row.'</div>';
					break;
				case 3:
					echo '<div id="price">'.$row.'</div>';
					break;
				case 4:
					echo '<div id="num">1</div>';
					break;
				default:
					break;
				}
			}
	$i++;
	}  
}
?>
</div>

<?php include '../inc/footer.php'?>
</body>
</html>