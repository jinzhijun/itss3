<?php 
include "../inc/pdo.php";

$action =$_POST['action'];
$cid = $_POST['cid'];
if($action =='show'){
	$sql = "UPDATE it_course SET isShow = '1' WHERE id = $cid";
	$res = $db_pdo->exec($sql);
	if($res){
		json(0,'上架成功');
	}else{
		json(1,'上架失败');
	}
}elseif ($action =='N_show') {
	$sql_1 = "UPDATE it_course SET isShow = '0' WHERE id = $cid";
	$res_1 = $db_pdo->exec($sql_1);
	if($res_1){
		json(0,'下架成功');
	}else{
		json(1,'下架失败');
	}	
}elseif ($action == 'up_1') {
	$sql_up = "UPDATE it_course SET isShow = '1' WHERE id = $cid";
	if ($db_pdo->exec($sql_up)) {
		json(0,'上架成功');	
	}
}elseif ($action =='up_2') {
	$sql_down = "UPDATE it_course SET isShow = '0' WHERE id = $cid";
	if ($db_pdo->exec($sql_down)) {
		json(0,'下架成功');	
	}
}elseif ($action == 'del') {
	$sql_del = "DELETE FROM it_course WHERE id = $cid";
	$res_del = $db_pdo->exec($sql_del);
	if ($res_del) {
		json(0,"删除成功");
	}else{
		json(1,'删除失败');
	}
}

?>