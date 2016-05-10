<?php
include "inc/config.php";
include "inc/chk.php";
$menu=$_GET['menu'];
$courseid=$_GET['courseid'];
$sql="select title from it_course where id='$courseid'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row){
	$title=$row['title'];
	}
?>
<!DOCTYPE HTML>
<html><head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" charset="utf-8">
<title>管理中心</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" /> 
<style>
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; } 
.ui-timepicker-div dl { text-align: left; } 
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; } 
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; } 
.ui-timepicker-div td { font-size: 90%; } 
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; } 
.ui_tpicker_hour_label,.ui_tpicker_minute_label,.ui_tpicker_second_label, 
.ui_tpicker_millisec_label,.ui_tpicker_time_label{padding-left:20px} 
</style>
<script src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script> 
<script type="text/javascript" src="js/jquery-ui-slide.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript">
$(function(){
	$('#b_time').datetimepicker({
		showSecond: true,
		timeFormat: 'hh:mm:ss'
		}); 
	$('#e_time').datetimepicker({
		showSecond: true,
		timeFormat: 'hh:mm:ss'
		}); 
	
	$('#cj').click(function(){
		var subject=$('#title').val();
		var startDate=$('#b_time').val();
		var invalidDate=$('#e_time').val();
		var loginName="admin@itss3.com";
		var password="888888";
		
		$.ajax({
			url:"http://itss3.gensee.com/integration/site/training/room/created",
			data:{subject:subject, startDate:startDate, invalidDate:invalidDate, loginName:loginName, password:password},
			dataType:"json",
			type:"post",
			success: function(e){
				if(e.code==0){
					$('#assistantToken').val(e.teacherToken)
					$('#webid').val(e.id)
					$('#number').val(e.number)
					$('#studentClientToken').val(e.studentClientToken)
					$('#studentJoinUrl').val(e.studentJoinUrl)
					$('#teacherJoinUrl').val(e.teacherJoinUrl)
					$('#teacherToken').val(e.teacherToken)
					}else{
						alert('创建失败')
						}
				}
			});
		});
	
	$('#save').click(function(){
		var courseid='<?php echo $courseid?>';
		var b_time=$('#b_time').val();
		var e_time=$('#e_time').val();
		var assistantToken=$('#assistantToken').val();
		var webid=$('#webid').val();
		var number=$('#number').val();
		var studentClientToken=$('#studentClientToken').val();
		var studentJoinUrl=$('#studentJoinUrl').val();
		var teacherJoinUrl=$('#teacherJoinUrl').val();
		var teacherToken=$('#teacherToken').val();
		
		$.ajax({
			url:"json/sh_zb_video.php",
			data:{
				courseid:courseid, 
				b_time:b_time, 
				e_time:e_time, 
				assistantToken:assistantToken, 
				number:number, 
				studentClientToken:studentClientToken, 
				studentJoinUrl:studentJoinUrl, 
				teacherJoinUrl:teacherJoinUrl, 
				teacherToken:teacherToken, 
				webid:webid
				},
			dataType:"json",
			type:"post",
			success: function(e){
				if(e.success==0){
					window.location.href="zb_video.php?menu=11";
					}else{
						alert(e.msg);
						}
				}
			})
		});
	});
</script>
</head>

<body>
<?php include 'inc/menu.php';?>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td width="100">课程名称：</td>
    <td>
    <input type="text" id="title" value="<?php echo $title?>" readonly></td>
  </tr>
  <tr>
    <td>开始时间：</td>
    <td><input type="text" id="b_time"></td>
  </tr>
  <tr>
    <td>结束时间：</td>
    <td><input type="text" id="e_time"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" id="cj" value="创建"></td>
  </tr>
  <tr>
    <td>assistantToken</td>
    <td><input type="text" id="assistantToken"></td>
  </tr>
  <tr>
    <td>id</td>
    <td><input type="text" id="webid"></td>
  </tr>
  <tr>
    <td>number</td>
    <td><input type="text" id="number"></td>
  </tr>
  <tr>
    <td>studentClientToken</td>
    <td><input type="text" id="studentClientToken"></td>
  </tr>
  <tr>
    <td>studentJoinUrl</td>
    <td><input type="text" id="studentJoinUrl"></td>
  </tr>
  <tr>
    <td>teacherJoinUrl</td>
    <td><input type="text" id="teacherJoinUrl"></td>
  </tr>
  <tr>
    <td>teacherToken</td>
    <td><input type="text" id="teacherToken"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" id="save" value="保存"></td>
  </tr>
</table>

</body>
</html>