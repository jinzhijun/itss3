<!DOCTYPE html>
<html>
<head>
	<title>修改直播</title>
	<link rel="stylesheet" type="text/css" href="./css/easyui.css">
	<link rel="stylesheet" type="text/css" href="./css/icon.css">
	<link rel="stylesheet" type="text/css" href="./css/demo.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.easyui.min.js"></script>
</head>
<body>
<?php
	try{
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}
	if (isset($_GET['id'])) {
		$sql_1 = 'select * from it_zvideo_list where id=:num';
		$stmt_1 = $db_pdo->prepare($sql_1);
		$stmt_1->bindParam(':num',$_GET['id']);
		$stmt_1->execute();
		$result = $stmt_1->fetch(PDO::FETCH_NUM);
	}else{
		echo "<h2><center>非法访问</center></h2>";
	}
?>
<form action="./videomod.php?id=<?php echo $_GET['id'];?>" method="post" >
		<label>标题</label><input type="text" name="title" value="<?php echo $result[2]; ?>"><br/>
		<label>讲师</label><input type="text" name="teacher" value="<?php echo $result[1]; ?>"><br/>
		<label>价钱</label><input type="text" name="price" value="<?php echo $result[7]; ?>"><br/>
		<label>简介</label><input type="text" name="abstract" value="<?php echo $result[3]; ?>"><br/>
		<label>开始时间</label><input class="easyui-datetimebox" value="<?php echo $result[5]; ?>" style="width:200px" name="time"><br/>	
		<label>结束时间</label><input class="easyui-datetimebox" value="<?php echo $result[8]; ?>" style="width:200px" name="endtime"><br/>	
		<input type="text" name="pic" id="pic" value="<?php echo $result[4]; ?>"><br/>
		<label>封面图片</label><input type="file" name="file"><br/> 
		<input type="submit" name="sub" value="提交"><br/>
</form>
</body>
</html>