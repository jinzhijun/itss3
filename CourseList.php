<?php
include_once("inc/config.php");
$parentid=$_GET['cateid'];
$pid=$_GET['pid'];
$depth=$_GET['depth'];
if(empty($parentid)) $parentid=0;
// function category($parentid){
// 	try {
// 		$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
// 	} catch (PDOException $e) {
// 		echo $e->getMessage();
// 		die();
// 	}
// 	$sql = "SELECT * FROM it_course_category WHERE parentid = :parentid";
// 	$stmt = $db_pdo->prepare($sql);
// 	$stmt->bindParam(":parentid",$parentid);
// 	$stmt->execute();
// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
// 	switch ($row['depth']) {
// 		case '0':
// 			echo '<a href="CourseList.php?cateid=$'.$row['id'].'">'.$row['name'].'</a>';
// 			break;
// 		case '1':
// 			$sql = "SELECT * FROM it_course_category WHERE id=:parentid";
// 			$stmt_1 = $db_pdo->prepare($sql_1);
// 			$stmt_1->bindParam(":parentid",$parentid);
// 			$stmt_1->execute();
// 			$row_1 = $stmt_1->fetch(PDO::FETCH_ASSOC);
// 			echo $row_1['name'];
// 			break;
		
// 		default:
// 			# code...
// 			break;
// 	}
// 		// echo '<a href="CourseList.php?cateid=$'.$row['id'].'">'.$row['name'].'</a>';
	
// }

?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>中国ITSS云教育平台</title>
<script src="http://www.itss3.cn/itss/JS/jquery.min.js" type="text/javascript"></script>
<script src="js/course.cate.js" type="text/javascript"></script>
<!-- <script src="js/course.dh.js" type="text/javascript"></script> -->
<script>
$(function(){
	category('CourseList.php')
	});
</script>
<link href="css/style0509.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include_once("inc/new_header.php");
?>
<section class="wrap" id="dh">你在这里：</section>
<section class="wrap" id="cate"></section>
<section>
	<div id="CourserList" class="wrap list">
        <ul>
<?php
ini_set('date.timezone','Asia/Shanghai');
function timediff($begin_time,$end_time) { 
	if($begin_time < $end_time){ 
         $starttime = $begin_time; 
         $endtime = $end_time; 
	} 
	else{ 
         $starttime = $end_time; 
         $endtime = $begin_time; 
	} 
      $timediff = $endtime-$starttime; 
      $days = intval($timediff/86400); 
      $remain = $timediff%86400; 
      $hours = intval($remain/3600); 
      $remain = $remain%3600; 
      $mins = intval($remain/60); 
      $secs = $remain%60; 
      $res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs); 
      return $res; 
}

$Page_size=28;
$keyword=$_GET['keyword'];
$cid=$_GET['cateid'];
$sql="select 
	it_course.id, 
	it_course.title, 
	it_course.img, 
	it_course.price, 
	it_user_teacher.name,
	(select count(*) from it_user_study where courseid=it_course.id) as bm,
	(select count(*) from it_course_video where course_id=it_course.id and url!='') as ks,
	it_user_teacher.name
	from it_course
	left join it_user_teacher on it_course.teacher_id=it_user_teacher.id
	";
$sql.=" where it_course.title like '%$keyword%' and it_course.genre='0' and it_course.isShow='1'";
if(!empty($cid)) $sql.=" and cateid='$cid'";

$sql.="order by it_course.id desc";
$result=mysql_query($sql); 
$count = mysql_num_rows($result); 
$page_count = ceil($count/$Page_size);
	
$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 
	
	//判断当前页码 
if(empty($_GET['page'])||$_GET['page']<0){ 
	$page=1; 
}else { 
	$page=$_GET['page']; 
}
$offset=$Page_size*($page-1);
$sql.=" limit $offset,$Page_size";
$rs=mysql_query($sql);
while($row=mysql_fetch_array($rs)){
	$price=$row['price'];
	if($price==0) $price="免费";
?>
        	<li>
                <a href="details.php?id=<?php echo $row['id']?>">
                <img src="<?php echo $row['img']?>" width="100%" height="165">
                <font><?php echo $row['title']?></font>
                <span>
                <img src="images/user-icon.png"><?php echo $row['bm']?>人学习 
                <img src="images/timer-icon.png" style="margin-left:10px;"><?php echo $row['ks']?>课时
                </span>
                <p><?php echo $row['name']?><i><?php echo $price?></i></p>
                </a>
            </li> 
<?php
}
    mysql_free_result($rs);
	
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$url='CourseList.php?cateid='.$parentid.'&pid='.$pid.'&keyword='.$keyword;
	$key=''; 
	//$key.="<font>$page/$pages</font> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href='".$url."&page=1'>首页</a> "; //第一页 
	$key.="<a href='".$url."&page=".($page-1)."'>上一页</a>"; //上一页 
	}else { 
	$key.="<b>第一页</b>";//第一页 
	$key.="<b>上一页</b>"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($i=$init;$i<=$max_p;$i++){ 
	if($i==$page){ 
	$key.='<span>'.$i.'</span>'; 
	} else { 
	$key.="<a href=".$url."&page=".$i."'>".$i."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.="<a href='".$url."&page=".($page+1)."'>下一页</a>";//下一页 
	$key.="<a href='".$url."&page=".$pages."'>末页</a>"; //最后一页 
	}else { 
	$key.="<b>下一页</b>";//下一页 
	$key.="<b>末页</b>"; //最后一页 
	} 
?>
            <li class="no"></li>
            <li class="no"></li>
            <li class="no"></li>
        </ul>
    </div>
    <div id="page"><?php echo $key?></div>
</section>
<?php include_once('inc/footer_1.php')?>
</body>
</html>