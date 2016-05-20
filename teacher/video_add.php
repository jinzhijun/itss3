<?php
include_once("inc/config.php");
include_once("inc/chklogin.php");
?>
<!DOCTYPE HTML>
<html xmlns:gs="http://www.gensee.com/ec">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="http://new.itss3.cn/xheditor/xheditor-1.1.13-zh-cn.min.js" type="text/javascript"></script>
<script src="js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript" src="static.gensee.com/webcast/static/sdk/js/gssdk.js"></script>
<script type="text/javascript">
$(function(){
	$('#content').xheditor({upImgUrl:"../upload.php",upImgExt:"jpg,jpeg,gif,png"});
	$.ajax({
		url:'json/cate.php',
		dataType:"json",
		type:"post",
		success: function(e){
			var data=e.d;
			for(var i=0;i<data.length;i++){
				var d=data[i];
				$('#cateid option').each(function(){
					if(d.parentid==$(this).val()){
						var str='';
						if(d.depth>0){
							str='|';
							for(var j=0; j<d.depth;j++){
								str=str+'__';
								}
							}
						$(this).after('<option value="'+d.id+'">'+str+d.name+'</option>')
						}
					})
				}
			}
		});
		
	var count = -1;
	$('#file').live('change',function(){
		count++;
		upload();
		$("#file").replaceWith('<input type="file" id="file" name="file" title="'+count+'">'); 
		});
	
	$('#save').click(function(){
		var cateid=$('#cateid').val();
		var title=$('#title').val();
		var img=$('#img').val();
		var description=$('#description').val();
		var price=$('#price').val();
		var service=$('#service').val();
		var content=$('#content').val();
		var teacher_id=$('#teacher_id').val();
		
		if(cateid==0){
			alert('请选择课程分类'); return false;
			}
		if(title==''){
			alert('请填写课程名'); return false;
			}
		if(img==''){
			alert('请上传课程封面'); return false;
			}
		if(content==0){
			alert('请填写课程详细描述'); return false;
			}
		
		$.ajax({
			url:"json/zVedio_add.php",
			data:{cateid:cateid,teacher_id:teacher_id,title:title, img:img, description:description, price:price, service:service, content:content},
			dataType:"html",
			type:"post",
			success: function(e){
				if(e==''){
					window.location.href='zVedio.php';
					}else{
						alert(e)
						}
				}
			})
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
<div id="divbtn">
<gs:gs-upload id="divbtn" site="itss3.gensee.com" browseid="divbtn" loginname="admin@itss3.com" ctx="training" password="888888" filetype="media"/>
<table width="100%" border="0" cellspacing="20" cellpadding="0" class="wrap" id="teacher_box">
  <tr>
    <td width="300" valign="top" class="menu">
	<h1>课程管理</h1>
	<a href="index.php" class="on">点播课程</a>
	<a href="zVedio.php" >直播课程</a>
	<h1 style="background-position:20px -20px;">订单管理</h1>
    <a href="order.php">已完成</a>
    <a href="order-1.php">待付款</a>
    <a href="order-2.php">已失效</a>
	<h1 style="background-position:20px -53px">结算中心</h1>
    <a href="withdraw.php">申请提现</a>
    <a href="settlement.php">结算管理</a>
	<h1 style="background-position:20px -83px;">个人设置</h1>
    <a href="info.php">基本信息</a>
    <a href="bindAccount.php">账号安全</a>
    </td>
    <td valign="top" class="content">
    <h2>点播课程</h2>
    <table width="100%" border="0" cellspacing="5" cellpadding="0" id="userinfo">
  <tr>
    <td width="100">课程分类：</td>
    <td><select id="cateid"><option value="0">=请选择=</option></select></td>
    </tr>
  <tr>
    <td>课程标题：</td>
    <td><input type="text" id="title"><input type="hidden" id="teacher_id" name="teacher_id" value="<?php echo $userid;?>"></input></td>
  </tr>
  <tr>
    <td>封面图片：</td>
    <td><input type="hidden" id="img" value=""><label for="file">上传课程封面<input type="file" name="file" id="file"></label></td>
  </tr>
  <tr>
    <td>课程简述：</td>
    <td><textarea id="description"></textarea></td>
  </tr>
  <tr>
    <td>课程价格：</td>
    <td><input type="text" id="price"></td>
  </tr>
  <tr>
    <td>适应人群：</td>
    <td><input type="text" id="service"></td>
  </tr>
  <tr>
    <td>课程描述：</td>
    <td><textarea rows="15" id="content" style="width:100%;"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="保存" id="save"></td>
  </tr>
    </table>

    </td>
  </tr>
</table>
</div>
</body>
</html>