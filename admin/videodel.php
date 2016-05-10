<?php
	try{
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}
	if(isset($_GET['id'])){
		$sql ='delete from it_zvideo_list where id=:id';
		$stmt = $db_pdo->prepare($sql);
		$stmt->bindParam(':id',$_GET['id']);
		$stmt->execute();
		if($stmt->rowCount()){
			echo '<h2><center>删除成功</center></h2>'.'<br>';
  			echo "<h2><center><a href='./zvideo.php'>返回直播列表</a></center></h2>";
		}else{
			echo "<h1><center>删除失败</center></h1>";
		}
	}else{
		echo "<h1><center>非法访问</center></h1>";
	}
?>