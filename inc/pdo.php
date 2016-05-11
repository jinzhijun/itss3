<?php
try {
	$db_pdo = new PDO('mysql:host=localhost;dbname=itss3',"itss","itss");
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
}
?>