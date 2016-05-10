<?php
include "inc/config.php";
include "inc/chk.php";
include '../inc/page.class.php';
$menu=$_GET['menu'];
$keyword=$_GET['keyword'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>管理中心</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('a.del').click(function(){
		var id=$(this).attr('id');
		$.ajax({
			type: "post",
			url: "json/link_action.php",
			dataType: "json",
			data:{action:'del',id:id},
			success: function(e){
				alert(e.msg);
				location.reload();
				},
			error: function (XMLHttpRequest, textStatus, errorThrown){}
			});
		});
	$('a.modify').click(function(){
		var id=$(this).attr('id');
		$.ajax({
			type: "post",
			url: "json/link_action.php",
			dataType: "json",
			data:{action:'modify',id:id},
			success: function(e){
				alert(e.msg);
				location.reload();
				},
			error: function (XMLHttpRequest, textStatus, errorThrown){}
			});
		});	

	});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
#list{background:#ddd; margin-top:20px;}
#list th{background:#1c2b36; color:#fff;}
#list tr{background:#fff;}
#list tr:hover{background:#f1f1f1;}
#list *{padding:4px;}
</style>
</head>

<body>
<?php include 'inc/menu.php';?>
<a href="link_add.php?menu=22">添加友情链接</a>
<table width="100%" border="0" cellspacing="1" cellpadding="0" id="list">
  <tr>
    <th>序号</th>
    <th>名称</th>
    <th>图片路径</th>
    <th>链接</th>
    <th>位置</th>
    <th>操作</th>
  </tr>
<?php
	try {
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
	$sql = 'select * from it_link';
	$result = $db_pdo->prepare($sql);
	$result->execute();
	$num = $result->rowCount();
	$page = new Page($num,10);
	$sql_1 = "select * from it_link {$page->limit}";
	$result_1 = $db_pdo->prepare($sql_1);
	$result_1->execute();
	while($row = $result_1->fetch(PDO::FETCH_ASSOC)){	
?>
  <tr>
    <td><?php echo $row["id"]?></td>
    <td align="center"><?php echo $row["title"]?></td>
    <td align="center"><?php echo $row["logo"]?></td>
    <td align="center"><?php echo $row["link"]?></td>
    <td align="center"><?php echo $row["num"]?></td>
    <td align="center"><a href="link_edit.php?id=<?php echo $row['id']?>">编辑</a>| <a href="javascript:;" class="del" id="<?php echo $row['id']?>">删除</a></td>
  </tr>
<?php
	}
	$pageList = $page->fpage();
?>
  <tr>
    <td colspan="8"><?php echo $pageList;?></td>
  </tr>
</table>

</body>
</html>