<?php
$action=$_POST['action'];
$title=$_POST['title'];
$img=$_POST['img'];
$link=$_POST['link'];
$num=$_POST['num'];
$id = $_POST['id'];
$uid = $_POST['uid'];

try {
	$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
}

if($action=='add'){
	if(!isset($title)){
		json(1,"标题不能为空");
	}
	if(!isset($img)){
		json(1,"图片不能为空");
	}
	if(!isset($link)){
		json(1,"链接不能为空");
	}
	// if(!isset($num)){
	// 	json(1,"序号不能为空");
	// }
	$sql = 'INSERT INTO it_link (title,logo,link,num) VALUES (:title,:img,:link,:num)';
	$result = $db_pdo->prepare($sql);
	$result->bindParam(':title',$title);
	$result->bindParam(':img',$img);
	$result->bindParam(':link',$link);
	$result->bindParam(':num',$num);
	$result->execute();
	if ($result->rowCount()) {
		json(0,"添加成功");
	}else{
		json(1,"添加失败");
	}
	
}elseif ($action =="del") {
	$sql = 'delete from it_link where id = :id';
	$result_1 = $db_pdo->prepare($sql);
	$result_1->bindParam(':id',$id);
	$result_1->execute();
	if ($result_1->rowCount()) {
		json(0,"删除成功");
	}else{
		json(1,"删除失败");
	}
}elseif ($action == "modify") {
	if(!isset($title)){
		json(1,"标题不能为空");
	}
	if(!isset($img)){
		json(1,"图片不能为空");
	}
	if(!isset($link)){
		json(1,"链接不能为空");
	}
	// if(!isset($num)){
	// 	json(1,"序号不能为空");
	// }
	$sql = 'UPDATE it_link SET title=:title,logo=:logo,link=:link,num=:num WHERE id=:uid';
	$stmt = $db_pdo->prepare($sql);
	$stmt->bindParam(":uid",$uid);
	$stmt->bindParam(":title",$title);
	$stmt->bindParam(":logo",$img);
	$stmt->bindParam(":link",$link);
	$stmt->bindParam(":num",$num);
	$stmt->execute();
	if ($stmt->rowCount()) {
		json(0,"更新成功");
	}else{
		json(1,"更新失败");
	}
}

function json($success,$msg){
	$arr = array(
		'success'=>$success,
		'msg'=>$msg
		);
	echo json_encode($arr);
	exit;
	}
?>