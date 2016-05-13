<?php
include "inc/user_info.php";
include "inc/pdo.php";
if(empty($userid)){
	header("location: ../login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
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
</head>
<body>
    <h2>基本信息</h2>
    <table width="100%" border="0" cellspacing="5" cellpadding="0" id="userinfo">
      <tr>
<!--         <td width="200" rowspan="6" align="center" valign="top">
        <input type="hidden" id="img" value=""><label for="file"><input type="file" name="file" id="file"></label>

        </td> -->
        <td width="100" align="right">姓名：</td>
        <td><input type="text" name="username" id="username"  value=""></td>
      </tr>
      <tr>
        <td align="right">联系电话：</td>
        <td><input type="text" name="phone" id="phone" value=""></td>
      </tr>
      <tr>
        <td align="right">QQ：</td>
        <td><input type="text" name="qq" id="qq" value=""></td>
      </tr>
      <tr>
        <td align="right">Email：</td>
        <td><input type="text" name="email" id="email" value=""></td>
      </tr>
      <tr>
        <td align="right">个人简介：</td>
        <td><textarea rows="10" name="description" id="description"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="保存" id="save"></td>
      </tr>
    </table>

</body>
</html>