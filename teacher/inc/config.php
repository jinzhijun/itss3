<?php
header("Content-type: text/html; charset=utf-8");
header("Access-Control-Allow-Origin:*"); 
header("Access-Control-Request-Method: GET, POST"); 
header("Cache-Control: no-cache");
header("Access-Control-Allow-Credentials:true");
header("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Range, Origin");
header("Access-Control-Expose-Headers: Content-Range");
header("Access-Control-Max-Age: 3600");

$dsn = 'mysql:dbname=itss3;host=localhost';
$user = 'itss';
$password = 'itss';
$db = new PDO($dsn, $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec('set names utf8');
?>