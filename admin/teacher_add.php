<?php
include "inc/config.php";
include "inc/chk.php";
$menu=$_GET['menu'];
$keyword=$_GET['keyword'];
$id=$_GET['id'];
$action= "add";
if(!empty($id)){
	$action="edit";
	$sql="select * from it_user_teacher where id='$id'";
	$rs=mysql_query($sql);
	$row=mysql_fetch_array($rs);
	if($row){
		$Tname=$row['name'];
		$phone=$row['phone'];
		$headimg=$row['headimg'];
		$introduction=$row['introduction'];
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>管理中心</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script src="js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	var count = -1;
	$('#file').live('change',function(){
		count++;
		upload();
		$("#file").replaceWith('<input type="file" id="file" name="file" title="'+count+'">'); 
		});
	
	$('#add').click(function(){
		var name=$('#name').val();
		var headimg=$('#img').val();
		var introduction=$('#introduction').val();
		var phone=$('#phone').val();
		var passw=$('#passw').val();
		
		$.ajax({
			url: "json/teacher_add.php",
			data: {id:'<?php echo $id?>',phone:phone,name:name, headimg:headimg, introduction:introduction, action:'<?php echo $action?>',passw:passw},
			dataType:"json",
			type: "POST",
			success: function(e){
				if(e.success==0){
					if(e.msg=='success'){
						sms(passw,phone);
					}
					alert(e.msg);
					window.location.href="teacher.php?menu=<?php echo $menu;?>";	
				}else{
					alert(e.msg);
				}
				}
			});
		});

	$('#agree').click(function(){

		$.ajax({
			url:"json/teacher_add.php",
			data:{action:"agree",uid:'<?php echo $row['uid']?>'},
			dataType:"json",
			type:"post",
			success:function(e){
				alert(e.msg);
				if(e.success == 0){
					window.location.href="teacher.php?menu=<?php echo $menu;?>";
				}
			}

		});
	});

	$('#N_agree').click(function(){

		$.ajax({
			url:"json/teacher_add.php",
			data:{action:"N_agree",uid:'<?php echo $row['uid']?>'},
			dataType:"json",
			type:"post",
			success:function(e){
				alert(e.msg);
				if(e.success == 0){
					window.location.href="teacher.php?menu=<?php echo $menu;?>";
				}
			}

		});
	});
	});
	function sms(passw,phone){
			$.ajax({
			url: "../phpsms/teacher_sms.php",
			data: {passw:passw,phone:phone},
			dataType:"json",
			type: "POST",
			success: function(e){

				}
			});
	}
function upload(){//上传图片
	$.ajaxFileUpload({
		url: '../upload.php',
		type: 'post',
		secureuri: false,
		fileElementId: 'file',
		dataType: 'json',
		success: function(data, status){
			$('#tab label img').remove();
			$('#tab label').append('<img src="'+data.msg.url+'">');
			$('#img').attr('value',data.msg.url);
			}
		});
	}
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
#tab td{padding:5px;}
#tab label{height:150px; width:150px; display:block; border:#ddd solid 1px; overflow:hidden; position:relative; background:url(images/teacher.png); cursor:pointer; background-size:100%}
#tab label input{position:absolute; top:-100px;}
#tab label img{width:100%; height:100%;}
</style>
</head>

<body>
<?php include 'inc/menu.php';?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="tab">
  <tr>
    <td width="100" align="right">讲师姓名：</td>
    <td><input type="text" id="name" value="<?php echo $Tname?>"></td>
  </tr>
  <tr>
    <td width="100" align="right">手机号码：</td>
    <td><input type="text" id="phone" value="<?php echo $phone?>"></td>
    <td><input type="hidden" id="passw" value="<?php echo rand(1111,9999);?>"></td>
  </tr>
  <tr>
    <td align="right">讲师照片：</td>
    <td>
    <input type="hidden" id="img" value="<?php echo $headimg?>">
    <label for="file">
    <input type="file" name="file" id="file">
    <?php
    if(!empty($headimg)) echo '<img src="'.$headimg.'">';
	?>
    </label>
    </td>
  </tr>
  <tr>
    <td align="right">讲师简介：</td>
    <td><textarea cols="100" rows="10" id="introduction"><?php echo $introduction?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="保存" id="add"></td>
  </tr>
</table>
<input type="button" value="同意" id="agree">
<input type="button" value="不同意" id="N_agree">
</body>
</html>