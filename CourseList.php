<?php
include_once("inc/config.php");
// include_once('inc/pdo.php');
$parentid=$_GET['cateid'];
if(empty($parentid)) $parentid=0;

function cate($parentid){
try {
	$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
}
	$sql="SELECT * FROM it_course_category WHERE parentid =:parentid";
	$stmt = $db_pdo->prepare($sql);
	$stmt->bindParam(":parentid",$parentid);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		switch ($row['depth']) {
			case '0':
				echo '<a href="CourseList.php?cateid='.$row['id'].'">'.$row['name'].'</a>'."--";
				break;
			case '1':
				echo '<a href="CourseList.php?cateid='.$row['id'].'">'.$row['name'].'</a>'."##";
				break;
			case '2':
				$sql_1 = "SELECT * FROM it_course_category WHERE id = :pid";
				$stmt_1 = $db_pdo->prepare($sql_1);
				$stmt_1->bindParam(":pid",$row['pid']);
				$stmt_1->execute();
				$res = $stmt_1->fetch(PDO::FETCH_ASSOC);
				echo '<a href="CourseList.php?cateid='.$res['parentid'].'">'.$res['name'].'</a>';
				break;
			default:
				echo "faild";
				break;
		}
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<link href="css/style0509.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include_once("inc/new_header.php");
?>
<?php cate($parentid)?>

</body>
</html>
