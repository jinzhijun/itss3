<?php
	include '../inc/pdo.php';

	$in_money = $_POST['in_money'];
	$uid	  = $_POST['uid'];

	if(is_numeric($in_money)){

		$sql_cash = "INSERT INTO it_user_cash_apply (uid,money,status,addtime) VALUES ('$uid','$in_money','0',NOW())";

		$stmt_cash = $db_pdo->exec($sql_cash);
		if ($db_pdo->lastInsertId()) {
			json(0,'提现申请已提交，请耐心等待');
		}else{
			json(0,'您已经有提现申请了');
		}

	}else{
		json(0,'输入不合法');
	}
?>