<html>
<head>
	<title>添加详细</title>
	<link rel="stylesheet" type="text/css" href="./css/easyui.css">
	<link rel="stylesheet" type="text/css" href="./css/icon.css">
	<link rel="stylesheet" type="text/css" href="./css/demo.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.easyui.min.js"></script>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
		<label>讲师</label><input type="text" name="teacher" value="<?php echo $_GET['uid']; ?>"><br/>
		<label>小标题</label><input type="text" name="title"><br/>
		<label>直播地址</label><input type="text" name="address"><br/>
		<label>开始时间</label><input class="easyui-datetimebox" value="04/15/2016 2:3:56" style="width:200px" name="ctime"><br/>	
		<label>结束时间</label><input class="easyui-datetimebox" value="04/15/2016 2:3:58" style="width:200px" name="etime"><br/>	
		<input type="submit" name="sub" value="提交"><br/>
</form>
</body>
</html>
<?php
	try {
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
	if(isset($_POST['sub']) && $_POST['sub']!==''){
			$sql = 'insert into it_zvideo_page (video_t,page_title,page_adress,page_ctime,page_etime) values (:teacher,:title,:adress,:ctime,:etime)';
			$stmt = $db_pdo->prepare($sql);
			$stmt->bindParam(':teacher',$_POST['teacher']);
			$stmt->bindParam(':title',$_POST['title']);
			$stmt->bindParam(':adress',$_POST['address']);
			$stmt->bindParam(':ctime',strtotime($_POST['ctime']));
			$stmt->bindParam('etime',strtotime($_POST['etime']));
			$stmt->execute();
			if ($stmt->rowCount()) {
		 		echo '<h2><center>添加成功</center></h2>'.'<br>';
  			echo "<h2><center><a href='./zvideo.php'>返回直播列表</a></center></h2>";
		  }else{
  			echo "<h1><center>添加失败</center></h1>";
		  }
		}else{
			echo "<h1><center>添加数据之后，点击提交</center></h1>";
		}
?>