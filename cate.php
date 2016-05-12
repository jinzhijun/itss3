<?php
// function _cate($id){
// 	$conn =mysql_connect("localhost","itss","itss"); 
// mysql_select_db("itss3");
// mysql_query("SET NAMES utf8");
// 	$sql = "SELECT * FROM it_course_category WHERE parentid = '".$id."'";
// 	$result = mysql_query($sql);
// 	if(mysql_num_rows($result)>0){
// 		while ($res = mysql_fetch_array($result)) {
// 			$tree[]['id'] = $res['id'];
// 			$tree[]['name'] = $res['name'];
// 			$tree[]['parentid'] = $res['parentid'];
// 			$tree[]['depth'] = $res['depth'];

// 			$tree = _cate($res['id']);
// 		}
// 	}
// 	// mysql_close($conn);
// 	return $tree;
// }
// echo "******"."<br/>";
// echo _cate(0);

function category($parentid){
	try {
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
		$sql = "SELECT * FROM it_course_category WHERE parentid ='$parentid'";
		$stmt = $db_pdo->query($sql);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// for ($row['id']; $row['id'] < 3; $row['id']++) { 
		// 	echo $row['id']."-----".$row['name']."<br/>";
		// 	category($row['id']);
		// }
		while ($stmt->rowCount()) {
			echo $row['id']."-----".$row['name']."<br/>";
			category($row['id']);
		}
}
category(0);
?>