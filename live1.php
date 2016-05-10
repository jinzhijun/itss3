<?php
	require 'page.class.php';
	require 'init.inc.php';
	try{
		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}
	$sql = "select video_teacher from it_zvideo_list";
	$result = $db_pdo->prepare($sql);
	$result->execute();
	$count = $result->rowCount();
	//echo $count;
	$num = 4;
	$page = new Page($count,$num);
	$sql_1 = "select * from it_zvideo_list {$page->limit}";
	$result_1 = $db_pdo->query($sql_1,PDO::FETCH_ASSOC);
	$data = $result_1->fetchALL();
//	$data=array();
//	foreach ($result_1 as $value) {
//		$data[]=$value;
//	}
//	var_dump($data);
	//echo 'hello';
//	$next = $page->next();
//	$pagenum = $page->pageList();
	$page_list = $page->fpage();
	$first = $page->first();
	$tpl->assign("first",$first);
	$tpl->assign("pagename",$pagenum);
	$tpl->assign("next",$next);
	$tpl->assign("page",$page_list);
	$tpl->assign('data',$data);
	$tpl->display('Public/head.html');
	$tpl->display("Home/live.html");
	$tpl->display('Public/foot.html');


?>
