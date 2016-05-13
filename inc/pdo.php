<?php
header("Content-type: text/html; charset=utf-8");
header("Access-Control-Allow-Origin:*"); 
header("Access-Control-Request-Method: GET, POST"); 
header("Cache-Control: no-cache");
header("Access-Control-Allow-Credentials:true");
header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Range, Origin");
header("Access-Control-Expose-Headers: Content-Range");
header("Access-Control-Max-Age: 3600");

try {
	$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
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