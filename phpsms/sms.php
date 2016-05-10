<?php
function Post($curlPost,$url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
		$return_str = curl_exec($curl);
		curl_close($curl);
		return $return_str;
}
function xml_to_array($xml){
	$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
	if(preg_match_all($reg, $xml, $matches)){
		$count = count($matches[0]);
		for($i = 0; $i < $count; $i++){
		$subxml= $matches[2][$i];
		$key = $matches[1][$i];
			if(preg_match( $reg, $subxml )){
				$arr[$key] = xml_to_array( $subxml );
			}else{
				$arr[$key] = $subxml;
			}
		}
	}
	return $arr;
}
$target = "http://106.ihuyi.com/webservice/sms.php?method=Submit";
//替换成自己的测试账号,参数顺序和wenservice对应

include "../inc/config.php";

$mobile = $_POST['mobile'];
if(empty($mobile)){
	echo '手机号码不能为空';
	exit;
}

$sql="select count(*) from it_user where username='$mobile'";
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if($row[0]>0){
	echo '该手机号码已注册';
	exit;
	}
session_start();
$vcode = rand(111111,999999);
$_SESSION['vcode']=$vcode;
$post_data = "account=cf_ITSS&password=RQptvu&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$vcode."。请不要把验证码泄露给其他人。");
//密码可以使用明文密码或使用32位MD5加密
$gets =  xml_to_array(Post($post_data, $target));
echo $gets['SubmitResult']['msg'];
?>
