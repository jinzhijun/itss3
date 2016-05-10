<?php

	header("Content-type:text/html;charset=utf-8");
	header("Access-Control-Allow-Origin:*"); 
	header("Access-Control-Request-Method: GET, POST"); 
	header("Cache-Control: no-cache");
	header("Access-Control-Allow-Credentials:true");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Range, Origin");
	header("Access-Control-Expose-Headers: Content-Range");
	header("Access-Control-Max-Age: 3600");
	define("ROOT", "D:/wwwroot/www.itss3.cn/");
	// define("ROOT", "E:/wamp/www/itss3/");
	include ROOT."libs/Smarty.class.php";
	session_start();
	$userid=$_SESSION['userid'];
	$username=$_SESSION['username'];
	$nickname=$_SESSION['nickname'];
	$headimgurl=$_SESSION['headimgurl'];
	$classify=$_SESSION['classify'];
	$tpl=new Smarty;
	$tpl->template_dir=ROOT."tpl/";
	$tpl->compile_dir=ROOT."Runtime";
	$tpl->left_delimiter="<{";
	$tpl->right_delimiter="}>";

	// try{
		// $db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
	// }catch(PDOException $e){
		// echo $e->getMessage();
		// exit;
	// }
	$conn =mysql_connect("localhost","itss","itss"); 
	mysql_select_db("itss3");
	mysql_query("SET NAMES utf8");

