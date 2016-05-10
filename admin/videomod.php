<?php
	try{
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}
	if(isset($_GET['id']) && isset($_POST['sub'])){
		$sql = 'update it_zvideo_list set video_teacher=:teacher,video_title=:title,video_abstract=:abstract,video_picture=:pic,video_time=:time,video_endtime=:endtime,
		video_price=:price where id=:id';
		$stmt = $db_pdo->prepare($sql);
		$stmt->bindParam(':teacher',$_POST['teacher']);
		$stmt->bindParam(':title',$_POST['title']);
		$stmt->bindParam(':abstract',$_POST['abstract']);
		$stmt->bindParam(':pic',$_POST['pic']);
		$stmt->bindParam(':time',strtotime($_POST['time']));
		$stmt->bindParam(':endtime',strtotime($_POST['endtime']));
		$stmt->bindParam(':price',$_POST['price']);
		$stmt->bindParam(':id',$_GET['id']);
		$stmt->execute();
		if ($stmt->rowCount()){
			echo '<h2><center>更新成功</center></h2>'.'<br>';
  			echo "<h2><center><a href='./zvideo.php'>返回直播列表</a></center></h2>";			
		}else{
			echo "<h1><center>更新失败</center></h1>";
		}
	}else{
		echo "<h2><center>非法访问</center></h2>";
	}
?>