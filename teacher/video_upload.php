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
<script type="text/javascript">
$(function(){
	$('#add').click(function(){
		var cid='<?php echo $_GET['cid'];?>';
		var title=$('#title').val();
		var url_video=$('#url_video').val();

		$.ajax({
			url:"json/upload_url.php",
			data:{title:title,cid:cid,url_video:url_video},
			dataType:"json",
			type:"post",
			success: function(e){
				if(e.success=='0'){
						alert(e.msg);
						location.reload();
					}else{
						alert('添加失败');
						location.reload();		
					}
				}
			})
		});
})
</script>
<link href="../css/style0509.css" rel="stylesheet" type="text/css">
<style>
body{background:#fafafa;}
</style>
</head>

<body>
<?php
	include_once("../inc/new_header.php");
	$cid = $_GET['cid'];
	if($_GET['frm']){
		$sql = "SELECT count(*) FROM it_course_video WHERE course_id = $cid";
		$stmt_1 = $db->query($sql);
		$result = $stmt_1->fetch(PDO::FETCH_NUM);
		$sort = $result[0]+1;
		$sql_2 = "INSERT INTO it_course_video (course_id,title,url,sort,addtime) VALUES ('$cid','$title','$url','$sort',NOW())";
		$stmt_2 = $db->exec($sql_2);
		if($db->lastInsertId()){
			header("Location: video_upload.php?cid=$cid");
		}
	}
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
    <h2>上传视频</h2>
   <div>
   	<div>
   		<label>标题</label><input type="text" id="title" name="title"><br>
   		<!-- <input type="hidden" name="cid" value=""> -->
   		<br>
   		<label>URL</label><input type="text" id="url_video" name="url"><br>
   		<input type="button" name="add" id="add" value="Add">
   	</div>

   	</div>
   	<table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
  	<tr>
  	  <th>标题</th>
  	  <th>视频地址</th>
  	  <th>操作</th>
  	</tr>
 	<?php
   		$sql_1="SELECT * FROM it_course_video WHERE course_id = $cid ORDER BY id ASC";
		$stmt = $db->query($sql_1);
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
   	?>
  		<tr>
  			<td><?php echo $row['title'];?></td>
  			<td><?php echo $row['url'];?></td>
  			<td><?php echo $row['addtime'];?></td>
  		</tr>
  	<?php
  		}
  	?>
  	</table>

    </td>
  </tr>
</table>
</div>
</body>
</html>