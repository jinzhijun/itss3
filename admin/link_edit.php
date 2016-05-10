<?php
	include "inc/chk.php";
	try {
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}	
	$sql = "select * from it_link where id=:id";
	$stmt = $db_pdo->prepare($sql);
	$stmt->bindParam(":id",$_GET['id']);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>管理中心</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="http://www.changuoxian.com/web_system/xheditor/xheditor-1.1.13-zh-cn.min.js" type="text/javascript"></script>
<script src="js/ajaxfileupload.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	//$('#content').xheditor({upImgUrl:"../upload.php",upImgExt:"jpg,jpeg,gif,png"});//编辑器插件
	var count = -1;
	$('#file').live('change',function(){
		count++;
		upload();
		$("#file").replaceWith('<input type="file" id="file" name="file" title="'+count+'">'); 
		});
	
	$('#but').click(function(){//添加LINK
		var title=$('#title').val();
		var img=$('#img').val();
		var num=$('#num').val();
		var link=$('#link').val();
		var uid=$('#uid').val();
		
		$.ajax({
			type: "post",
			url: "json/link_action.php",
			dataType: "json",
			data:{action:'modify',uid:uid,title:title,img:img,num:num,link:link},
			success: function(e){
				alert(e.msg);
				location.reload();
				},
			error: function (XMLHttpRequest, textStatus, errorThrown){}
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
#tab label{height:150px; width:200px; display:block; border:#ddd solid 1px; overflow:hidden; position:relative; background:url(images/videoBg.png); cursor:pointer;}
#tab label input{position:absolute; top:-100px;}
#tab label img{width:100%; height:100%;}
#teacher_list{position:absolute; z-index:999; display:none; border:#ddd solid 1px; background:#fff;}
#teacher_list li{padding:10px; cursor:pointer;}
#teacher_list li:hover{background:#eee;}
</style>
</head>

<body>
<?php include 'inc/menu.php';?>
<div id="teacher_list">
	<input type="text" placeholder="讲师搜索" id="search">
    <ul></ul>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="tab">
  <tr>
    <td width="100" align="right">标题：</td>
    <td><input type="hidden" id="uid" value="<?php echo $result['id']?>"></input><input type="text" size="100" id="title" value="<?php echo $result['title']?>"></td>
  </tr>
  <tr>
    <td align="right">链接图片</td>
    <td><input type="hidden" id="img" value="<?php echo $result['logo']?>"><label for="file"><img src="<?php echo $result['logo']?>"><input type="file" id="file" name="file" value=""></label></td>
  </tr>
  <tr>
    <td align="right">链接地址</td>
    <td><input type="text" size="100" id="link" value="<?php echo $result['link']?>"></td>
  </tr>
  <tr>
    <td align="right">序号</td>
    <td><input type="text" id="num"	value="<?php echo $result['num']?>"></input></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="编辑" id="but"></td>
  </tr>
</table>

</body>
</html>