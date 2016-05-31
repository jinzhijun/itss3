<?php
include_once("inc/chklogin.php");
include_once("inc/pdo.php");
$sql = "SELECT * FROM it_user_teacher WHERE uid = :uid";
$stmt = $db_pdo->prepare($sql);
$stmt->bindParam(":uid",$userid);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
  // $('#content').xheditor({upImgUrl:"../upload.php",upImgExt:"jpg,jpeg,gif,png"});
  

  var count = -1;
  $('#file').live('change',function(){
    count++;
    upload();
    $("#file").replaceWith('<input type="file" id="file" name="file" title="'+count+'">'); 
    });
  
  $('#save').click(function(){
    var name=$('#username').val();
    var phone=$('#phone').val();
    var img=$('#img').val();
    var description=$('#description').val();
    var qq=$('#qq').val();
    var email=$('#email').val();
    var userid=<?php echo $userid; ?>;
    
    if(name==""){
      alert('姓名不能为空'); return false;
      }
    if(phone==''){
      alert('手机号不能为空'); return false;
      }
    
    $.ajax({
      url:"json/info.php",
      data:{action:"save",userid:userid,name:name, phone:phone, img:img, description:description, qq:qq, email:email},
      dataType:"html",
      type:"post",
      success: function(e){
		 if(e.success=='0'){
			 alert("设置成功");
			 location.reload();
			 } 
		 }
      });
    });
  
  });

function upload(){//上传图片
  $.ajaxFileUpload({
    url: '../upload.php', 
    type: 'post',
    secureuri: false,
    fileElementId: 'file',
    dataType: 'json',
    success: function(data, status){
      $('#userinfo label img').remove();
      $('#userinfo label').append('<img src="'+data.msg.url+'">');
      $('#img').attr('value',data.msg.url);
      }
    });
  }
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
	<a href="zVedio.php">直播课程</a>
	<h1 style="background-position:20px -20px;">订单管理</h1>
    <a href="order.php">已完成</a>
    <a href="order-1.php">待付款</a>
    <a href="order-2.php">已失效</a>
	<h1 style="background-position:20px -53px">结算中心</h1>
    <a href="withdraw.php">申请提现</a>
    <a href="settlement.php">结算管理</a>
	<h1 style="background-position:20px -83px;">个人设置</h1>
    <a href="info.php" class="on">基本信息</a>
    <a href="bindAccount.php">账号安全</a>
    </td>
    <td valign="top" class="content">
    <h2>基本信息</h2>
    <table width="100%" border="0" cellspacing="5" cellpadding="0" id="userinfo">
      <tr>
        <td width="200" rowspan="6" align="center" valign="top">
        <input type="hidden" id="img" value="<?php echo $result['headimg']?>"><label for="file"><img src="<?php echo $result['headimg']?>"><input type="file" name="file" id="file"></label>

        </td>
        <td width="100" align="right">姓名：</td>
        <td><input type="text" name="username" id="username"  value="<?php echo $result['name']?>"></td>
      </tr>
      <tr>
        <td align="right">联系电话：</td>
        <td><input type="text" name="phone" id="phone" value="<?php echo $result['phone']?>"></td>
      </tr>
      <tr>
        <td align="right">QQ：</td>
        <td><input type="text" name="qq" id="qq" value="<?php echo $result['qq']?>"></td>
      </tr>
      <tr>
        <td align="right">Email：</td>
        <td><input type="text" name="email" id="email" value="<?php echo $result['email']?>"></td>
      </tr>
      <tr>
        <td align="right">个人简介：</td>
        <td><textarea rows="10" name="description" id="description"><?php echo $result['introduction']?></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="保存" id="save"></td>
      </tr>
    </table>

    </td>
  </tr>
</table>

</body>
</html>