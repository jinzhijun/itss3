<?php 
	include '../inc/pdo.php';

	$uid = $_POST['userid'];
	$priceLast = $_POST['priceLast'];
	$action  = $_POST['action'];
	$coursid = $_POST['coursid'];

	if($action=='pay'){
		@$orderNo = build_order_no();
		// $db_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		// try{
		// 	$db_pdo->beginTransaction();
		// 	$db_pdo->exec("INSERT INTO it_order (userid,orderid,status,price,addtime) VALUES ($userid,$orderNo,'1',$priceLast,NOW())");
		// 	$db_pdo->commit();
		// }catch(PDOException $e){

		// }


		json(0,"$orderNo");
	}

	function build_order_no(){
	return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
	}
 ?>