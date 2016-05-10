<?php
header ( "Content-Type: text/html; charset=utf-8" );

//PHP调用有SoapHeader认证的WebService

//在php.ini中开启extension=php_soap.dll
try {

	$client = new SoapClient ( "http://106.ihuyi.com/webservice/sms.php?WSDL", array ('trace' => 1, 'uri' => 'http://106.ihuyi.com/' ) );	

	/*echo ("SOAP服务器提供的开放函数:");
	echo ('<pre>');
	print_r( $client->__getFunctions () );
	echo ('</pre>');
	echo ("SOAP服务器提供的Type:");
	echo ('<pre>');
	print_r( $client->__getTypes () );
	echo ('</pre>');*/

	$data['account'] = '用户名';
	$data['password'] = '密码';//密码可以使用明文密码或使用32位MD5加密
	$data['content'] = '您的验证码是：8569。请不要把验证码泄露给其他人。';	
	$data['mobile'] = '手机号码';
	
	$out = $client->Submit($data);
	echo ('<pre>');
	print_r($out);
	echo ('</pre>');
	
	echo '错误代码：'.$out->SubmitResult->code;
	echo '<br>错误消息：'.$out->SubmitResult->msg;
		
} catch (SoapFault $fault){
	echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}

?>
