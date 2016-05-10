<?php
include "inc/chk.php";
$genre=$_GET['genre'];
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
	
	$.ajax({
		type: "post", 
		url: "json/course_cate_json.php",
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
	
	$('#teacher').click(function(){//查询讲师
		var obj = $(this);
		var offset = obj.offset();   
		var x=offset.left
		var y=offset.top
		$('#teacher_list').css({left:x, top:y}).show();
		$('#search').focus();
		search_teacher();
		});
	$('#search').keydown(function(){
		$('#teacher_list ul').html('');
		search_teacher($(this).val());
		})	
	
	
	$('#but').click(function(){//添加课程
		var cateid=$('#cateid').val();
		var title=$('#title').val();
		var description=$('#description').val();
		var teacher_id=$('#teacher_id').val();
		var img=$('#img').val();
		var price=$('#price').val();
		var service=$('#service').val();
		var content=$('#content').val();
		var courserid=$('#courserid').val();
		var b_time=$('#b_time').val();
		var e_time=$('#e_time').val();
		// var assistantToken=$('#assistantToken').val();
		// var webid=$('#webid').val();
		// var webnum=$('#webnum').val();
		// var studentToken=$('#studentToken').val();
		// var studentUrl=$('#studentUrl').val();
		// var teacherToken=$('#teacherToken').val();
		// var teacherUrl=$('#teacherUrl').val();
		var genre='<?php echo $genre?>';
		
		$.ajax({
			type: "post", 
			url: "json/course_action.php",
			dataType: "json",
			data:{action:'add', cateid:cateid, title:title, description:description, teacher_id:teacher_id, img:img, price:price,service:service, content:content, genre:genre,courserid:courserid,b_time:b_time,e_time:e_time},
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
			$('#tab label').append('<img src="'+data.msg.url+'">');
			$('#img').attr('value',data.msg.url);
			}
		});
	}

function search_teacher(key){
	$.ajax({
		type: "post", 
		url: "json/tearch_search.php",
		data:{keyword:key},
		dataType: "json",
		success: function(e){
			var data=e.d;
			for(var i=0; i<data.length; i++){
				var o=data[i];
				$('#teacher_list ul').append('<li id="'+o.id+'">'+o.name+'</li>');
				}
			//选择讲师
			$('#teacher_list ul li').click(function(){
				$('#teacher').attr('value', $(this).text());
				$('#teacher_id').attr('value', $(this).attr('id'));
				$('#teacher_list ul').html('');
				$('#teacher_list').hide();
				});
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
<div id="teacher_list">
	<input type="text" placeholder="讲师搜索" id="search">
    <ul></ul>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="tab">
  <tr>
    <td width="100" align="right">分类：</td>
    <td><select id="cateid"><option value="0">-请选择-</option></select></td>
  </tr>
  <tr>
    <td width="100" align="right">标题：</td>
    <td><input type="text" size="100" id="title"></td>
  </tr>
  <tr>
    <td align="right">课程简述：</td>
    <td><textarea cols="100" rows="3" id="description"></textarea></td>
  </tr>
  <tr>
    <td align="right">讲师：</td>
    <td><input type="text" id="teacher" readonly><input type="hidden" id="teacher_id"></td>
  </tr>
  <tr>
    <td align="right">封面图片：</td>
    <td><input type="hidden" id="img" value=""><label for="file"><input type="file" id="file" name="file"></label></td>
  </tr>
  <tr>
    <td align="right">单价：</td>
    <td><input type="text" id="price"></td>
  </tr>
  <tr>
    <td align="right">适用人群：</td>
    <td><input type="text" size="100" id="service"></td>
  </tr>
  <tr>
    <td align="right">课程描述：</td>
    <td><textarea cols="100" rows="20" id="content"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="添加" id="but"></td>
  </tr>
</table>

</body>
</html>