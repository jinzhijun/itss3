<?php
include "inc/user_info.php";
include "inc/pdo.php";
if(empty($userid)){
	header("location: ../login.php");
	}
if($classify){
  header("location:../teacher/zVedio.php");
}
 $sql = "SELECT uid,name,introduction,phone,qq,email FROM it_user_teacher WHERE uid =:uid";
 $stmt = $db_pdo->prepare($sql);
 $stmt->bindParam(':uid',$userid);
 $stmt->execute();
 $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>中国ITSS云教育平台 - 个人讲师开课</title>
	<link href="/css/style0509.css" rel="stylesheet" type="text/css">
	<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="teacher/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		
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
    var userid=<?php echo $userid ?>;
    
    if(name==""){
      alert('姓名不能为空'); return false;
      }
    if(phone==''){
      alert('手机号不能为空'); return false;
      }
    
    $.ajax({
      url:"json/register.php",
      data:{action:"register",userid:userid ,name:name, phone:phone, img:img, description:description, qq:qq, email:email},
      dataType:"json",
      type:"post",
      success: function(e){
        if(e.success==0){
          alert(e.msg);
        // location.reload();
       } 
     }
      });
    });


	});
		function upload(){//上传图片
 		$.ajaxFileUpload({
    	url: '/upload.php', 
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
<style>
body{background:#f1f1f1;}
#frm{background:#fff;}
#frm h2{border-bottom:#ddd solid 1px; padding:40px; font:25px/25px '微软雅黑';}
#frm table{padding-bottom:100px;}
</style>
</head>
<body>
<?php
include_once("inc/new_header.php");
?>

<div class="wrap" id="frm">
    <h2>个人讲师开课</h2>
    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="15" id="userinfo">
      <tr>
<!--         <td width="200" rowspan="6" align="center" valign="top">
        <input type="hidden" id="img" value=""><label for="file"><input type="file" name="file" id="file"></label>

        </td> -->
        <td width="100" align="right">姓名：</td>
        <td><input type="text" name="username" id="username"  value="<?php echo $result['name'];?>"></td>
      </tr>
      <tr>
        <td align="right">联系电话：</td>
        <td><input type="text" name="phone" id="phone" value="<?php echo $result['phone'];?>"></td>
      </tr>
      <tr>
        <td align="right">QQ：</td>
        <td><input type="text" name="qq" id="qq" value="<?php echo $result['qq'];?>"></td>
      </tr>
      <tr>
        <td align="right">Email：</td>
        <td><input type="text" name="email" id="email" value="<?php echo $result['email'];?>"></td>
      </tr>
      <tr>
        <td align="right">个人简介：</td>
        <td><textarea rows="10" name="description" id="description" style="margin-left:10px; width:95%;"><?php echo $result['introduction'];?></textarea></td>
      </tr>
      <?php
        if($result['uid']){
        ?>
      <tr>
      	<td></td>
        <td><p>您的申请已提交，请耐心等待！</p></td>
      </tr>
      <?php
        }else{
        ?>
	  <tr>
        <td>&nbsp;</td>
        <td><input type="radio" value="" style="width:20px;" checked>我已阅读并接收 《云教育合作协议》</td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="申请开课" id="save" style="width:320px;"></td>
      </tr>
      <?php
        }
        ?>
    </table>
</div>
<?php include_once('inc/footer_1.php')?>

</body>
</html>