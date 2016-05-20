<?php
	include 'inc/pdo.php';
	include 'inc/user_info.php';
	if(empty($userid)){
		header("Location:login.php");
		exit;
	}

	$courseid = $_GET['courseid'];

	$sql = "SELECT it_course.title, it_course.teacher_id,it_course.img ,it_course.price,it_course.genre,it_user_teacher.name FROM it_course LEFT JOIN it_user_teacher ON it_course.teacher_id = it_user_teacher.uid WHERE it_course.id =:courseid";

	$stmt = $db_pdo->prepare($sql);
	$stmt->bindParam(":courseid",$courseid);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	$priceLast = $result['price'];
?>
<html>
<head>
	<title><?php echo $result['title'];?></title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){
      //优惠券下拉列表
      // $.ajax({
      //   type:"post",
      //   url:"json/coupon.php",
      //   dataType:"post",
      //   success: function(e){

      //   },

      // });

			$('#orderpay').click(function(){
          			var priceLast='<?php echo $priceLast;?>';
					var courseid='<?php echo $courseid;?>';
					var teacher_id='<?php echo $result['teacher_id'];?>';
					var title='<?php echo $result['title'];?>';
				$.ajax({
					type:"post",
					url:"json/order_confirm.php",
					data:{action:"pay",priceLast:priceLast,courseid:courseid,teacher_id:teacher_id,title:title},
					dataType:"json",
					success: function(e){
						if(e.success == 0){
            				$('#WIDout_trade_no').val(e.msg);
            				$('#order').submit();
            			}
					}

				});
			});



		});
	</script>
<style>
#cart{border:#ddd solid 1px; margin-top:50px;}
#cart td{border-bottom:#ddd solid 1px; padding-bottom:30px;}
#cart h1{display:block; width:100%; margin-bottom:10px;}
#cart h2{display:inline-block; width:150px;}
#cart .course img{width:250px; float:left;}
#cart .pay_icon{border:#ddd solid 1px; border-radius:5px; margin-right:20px;}
#cart .course_info{float:left; width:500px; margin-left:30px;}
#cart .title{font:bold 20px/40px '';}
#cart .teacher{font:16px/30px '';}
#cart .price{font:bold 16px/30px ''; color:red;}
#pay{text-align:right; font-size:20px; margin-top:30px;}
#pay b{font-size:20px; color:red; margin-right:30px;}
#pay input{height:50px; width:130px; background:orange; color:#fff; font-size:20px; border:0; cursor:pointer;}
#pay input:hover{ background:red;}
</style>
<link href="css/style0509.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include "inc/new_header.php" ?>
<section class="wrap">
<table width="100%" border="0" cellspacing="30" cellpadding="0" id="cart">
  <tr>
    <td class="course">
    <h1>核对课程信息</h1>
    <img src="<?php echo $result['img'];?>">
    <div class="course_info">
    	<div class="title"><?php echo $result['title'];?></div>
    	<div class="teacher"><?php echo $result['name'];?></div>
    	<div class="price"><?php echo $result['price'];?>元</div>
    </div>
    </td>
  </tr>
  <tr>
    <td><h2>使用优惠券</h2><select id="coupon"><option value="0">优惠券下拉列表</option></select></td>
  </tr>
  <tr>
    <td style="padding:0; border:none;">
    <h1>选择支付方式</h1>
    
    	<label for="alipay" class="alipay">
        <input type="radio" id="alipay" name="pay" value="1" checked>
			<img src="/images/payment_1.jpg" class="pay_icon">
		</label>
		
		<label for="wechat" class="alipay">
        <input type="radio" id="wechat" name="pay" value="2">
		<img src="/images/payment_2.jpg" class="pay_icon">
		</label>
    </td>
  </tr>
</table>
<div id="pay">
应付总额:<b><?php echo $priceLast;?> 元</b>
<input type="button" id="orderpay" value="确认付款">
</div>
</section>

<form id="order" action="alipay/alipayapi.php" method="post">
  <input type="hidden" id="WIDout_trade_no" name="WIDout_trade_no" >
  <input type="hidden" id="WIDtotal_fee" name="WIDtotal_fee" value="<?php echo $priceLast; ?>">
</form>
</body>
</html>