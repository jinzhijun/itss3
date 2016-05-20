<?php 
	include '../inc/pdo.php';
	include '../inc/user_info.php';

	$priceLast = $_POST['priceLast'];
	$action  = $_POST['action'];
	$courseid = $_POST['courseid'];
	$teacher_id = $_POST['teacher_id'];
	$title = $_POST['title'];

	if($action=='pay'){
		@$orderNo = build_order_no();

		//创建订单明细，状态未支付
		$sql_item = "INSERT INTO it_order_item (orderid,status,course_id,teacher_id,title,price,addtime) VALUES ('$orderNo','1','$courseid','$teacher_id','$title','$priceLast',NOW())";
		 $res_item = $db_pdo->exec($sql_item);

		//创建订单，订单状态为1,未支付

		$sql = "INSERT INTO it_order (userid,orderid,status,price,addtime) VALUES ($userid,$orderNo,'1',$priceLast,NOW())";
		$res = $db_pdo->exec($sql);

		if($res){
			json(0,"$orderNo");	
		}
		
		
	}

	function build_order_no(){
	return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
	}
 ?>