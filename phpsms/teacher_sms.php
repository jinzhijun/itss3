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

$passw = $_POST['passw'];
$mobile = $_POST['phone'];

$post_data = "account=cf_ITSS&password=RQptvu&mobile=".$mobile."&content=".rawurlencode("您在云教育平台讲师帐号已创建，密码是：".$passw."。请不要把密码泄露给其他人。http://www.itss3.com");
//密码可以使用明文密码或使用32位MD5加密
$gets =  xml_to_array(Post($post_data, $target));
echo $gets['SubmitResult']['msg'];
?>
