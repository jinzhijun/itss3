<?php
include "inc/chk.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>管理中心</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script>
$(function(){
	$('#but').click(function(){
		var parentid=$('#parentid').val();
		var name=$('#name').val();
		if(name==''){
			alert('请输入分类');
			return false;
			}
		var but=$(this);
		but.attr("disabled","disabled");
		$.ajax({
			type: "post", 
			url: "json/artical_cate.php",
			dataType: "json",
			data:{parentid:parentid, name:name, action:'add'},
			success: function(e){
				but.removeAttr("disabled");
				location.reload();
				},
			error: function (XMLHttpRequest, textStatus, errorThrown){
				but.removeAttr("disabled");
				}
		});
	});
	
	$.ajax({
		type: "post", 
		url: "json/artical_cate_json.php",
		dataType: "json",
		success: function(e){
			var data=e.d;
			for(var i=0; i<data.length; i++){
				var o=data[i];
				if(o.parentid==0){
					$('#cate').append('<tr id="o'+o.id+'"><th>'+o.name+'</th><td>&nbsp;</td></tr>');
					}else{
						$('#cate #o'+o.parentid).find('td').append('<a href="#">'+o.name+'</a>');
						}
				$('#parentid option').each(function(){//select赋值开始
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
});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
#cate{background:#ddd; margin-top:20px;}
#cate tr{background:#fff;}
#cate .top{background:#1c2b36; color:#fff;}
#cate *{padding:4px; text-align:left;}
</style>
</head>

<body>
<?php include 'inc/menu.php';?>
<label>
上级分类：
<select id="parentid">
	<option value="0">- 请选择 -</option>
</select>
</label>
<label>子分类：<input type="text" id="name"></label>
<input type="button" value="添加" id="but">

<table width="100%" border="0" cellspacing="1" cellpadding="0" id="cate">
  <tr>
    <th width="100" class="top">一级分类</th>
    <th class="top">二级分类</th>
  </tr>
</table>

</body>
</html>