<?php
	require 'init.inc.php';
	try{
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}	
	$sql = "select page_adress from it_zvideo_page where id={$_GET['id']}";
	$stmt_1 = $db_pdo->prepare($sql);
	$stmt_1->execute();
	$data = $stmt_1->fetch(PDO::FETCH_NUM);
	$tpl->assign('data',$data);
	$tpl->display('Public/head.html');
	$tpl->display("Home/live3.html");
	$tpl->display('Public/foot.html');
?>