<!DOCTYPE html>
<html>
<head>
	<title>添加直播</title>
	<link rel="stylesheet" type="text/css" href="./css/easyui.css">
	<link rel="stylesheet" type="text/css" href="./css/icon.css">
	<link rel="stylesheet" type="text/css" href="./css/demo.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.easyui.min.js"></script>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
		<label>标题</label><input type="text" name="title"><br/>
		<label>讲师</label><input type="text" name="teacher"><br/>
		<label>价钱</label><input type="text" name="price"><br/>
		<label>简介</label><input type="text" name="abstract"><br/>
		<label>开始时间</label><input class="easyui-datetimebox" value="04/15/2016 2:3:56" style="width:200px" name="time"><br/>	
		<label>结束时间</label><input class="easyui-datetimebox" value="04/15/2016 2:3:58" style="width:200px" name="endtime"><br/>	
		<input type="text" name="pic" id="pic"><br/>
		<label>封面图片</label><input type="file" name="file"><br/> 
		<input type="submit" name="sub" value="提交"><br/>
</form>
</body>
</html>
<?php
	try{
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}
if(isset($_POST['sub']) && $_POST['sub']!==''){
 $sql="insert into it_zvideo_list (video_teacher,video_title,video_abstract,video_picture,video_time,video_endtime,video_price) values (:teacher,:title,:abstract,:picture,:time,:endtime,:price)";
  $stmt= $db_pdo->prepare($sql);
  $stmt->bindParam(':teacher',$_POST['teacher']);
  $stmt->bindParam(':title',$_POST['title']);
  $stmt->bindParam(':abstract',$_POST['abstract']);
  $stmt->bindParam(':picture',$_POST['pic']);
  $stmt->bindParam(':time',strtotime($_POST['time']));
  $stmt->bindParam(':endtime',strtotime($_POST['endtime']));
  $stmt->bindParam(':price',$_POST['price']);

  $stmt->execute();
  if($stmt->rowCount()){
  	echo '<h2><center>添加成功</center></h2>'.'<br>';
  	echo "<h2><center><a href='./zvideo.php'>返回直播列表</a></center></h2>";
  }else{
  	echo "<h1><center>添加失败</center></h1>";
  }
}else{
	echo "<h1><center>添加数据之后，点击提交</center></h1>";
}
?>