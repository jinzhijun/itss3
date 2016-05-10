<?php
include "inc/config.php";
include "inc/chk.php";
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
	cate();//添加分类
	
	$('#but').click(function(){
		var cateid=$('#cateid').val();
		var title=$('#title').val();
		var content=$('#content').val();
		var url=$('#url').val();
		
		if(cateid==''){alert('请选择分类'); return false;}
		if(title==''){alert('请填写标题'); return false;}
		if(content==''){alert('请填写文章内容'); return false;}
		
		$.ajax({
			url:"json/artical_action.php",
			data:{cateid:cateid, title:title, content:content, url:url, action:'add'},
			type:"post",
			dataType:"json",
			success: function(e){
				alert(e.msg); location.reload();
				}
			});
		
		});
});

function cate(){
	$.ajax({
		type: "post", 
		url: "json/artical_cate_json.php",
		dataType: "json",
		success: function(e){
			var data=e.d;
			for(var i=0; i<data.length; i++){
				var o=data[i];
				$('#cateid option').each(function(){//select赋值开始
					if(o.parentid==$(this).val()){
						var str='';
						if(o.depth>0){
							str='|';
							for(var j=0; j<o.depth;j++){
								str=str+'_';
								}
							}
						$(this).after('<option value="'+o.id+'">'+str+o.name+'</option>')
						}
					});
				}
			},
		error: function (XMLHttpRequest, textStatus, errorThrown){}
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="tab">
  <tr>
    <td width="100" align="right">分类：</td>
    <td><select name="cateid" id="cateid">
      <option value="0">-请选择-</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">标题：</td>
    <td><input type="text" size="100" id="title"></td>
  </tr>
  <tr>
    <td align="right">内容：</td>
    <td><textarea name="content" cols="100" rows="20" id="content"></textarea></td>
  </tr>
  <tr>
    <td align="right">链接地址：</td>
    <td><input type="text" size="100" id="url"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="添加" id="but"></td>
  </tr>
</table>

</body>
</html>