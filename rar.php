<?php
$rar = new ZipArchive;
if($rar->open('bak.zip') === TRUE){
		$rar->extractTo('D:/www/itss/bin/test/');
		$rar->close();
		echo 'ok';
}else{
		echo 'failed';
}
?>