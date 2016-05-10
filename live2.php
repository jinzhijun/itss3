<?php
	require 'page.class.php';
	require 'init.inc.php';
	try{
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}	

	$sql = "select * from it_zvideo_list where id = {$_GET['uid']}";
	$stmt = $db_pdo->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$now = time();
	$sql = "select id from it_zvideo_page where video_t='{$_GET['teh']}'";
	$stmt_1 = $db_pdo->prepare($sql);
	$stmt_1->execute();
	$count = $stmt_1->rowCount();
	$num = 3;
	$page = new Page($count,$num);
	$sql_1 = "select * from it_zvideo_page where video_t ='{$_GET['teh']}' {$page->limit}";
	$stmt_2 = $db_pdo->query($sql_1);
	$data_1 = $stmt_2->fetchAll(PDO::FETCH_ASSOC);

	$tpl->assign('data_1',$data_1);
	$tpl->assign('data',$result);
	$tpl->assign('now',$now);
	$tpl->display('Public/head.html');
	$tpl->display("Home/live2.html");
	$tpl->display('Public/foot.html');
?>