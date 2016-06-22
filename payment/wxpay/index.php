<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: text/plain');

require_once("classes/RequestHandler.class.php");
require_once("classes/ResponseHandler.class.php");
require("classes/client/TenpayHttpClient.class.php");

//财付通商户号
$PARTNER = "财付通商户号";
//财付通密钥
$PARTNER_KEY = "财付通密钥";
//appid
$APP_ID="移动应用AppID";
//appsecret
$APP_SECRET= "移动应用AppSecret";   
//paysignkey(非appkey)
$APP_KEY="支付签名密钥";
//支付完成后的回调处理页面
$notify_url = "http://demo.dcloud.net.cn/helloh5/payment/wxnotify.php";


// 获取支付金额
$amount='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $amount=$_POST['total'];
}else{
    $amount=$_GET['total'];
}
$total = floatval($amount);
if(!$total){
    $total = 1;
}
$total = $total*100;     // 转成分

// 商品名称
$subject = 'DCloud项目捐赠';
// 订单号，示例代码使用时间值作为唯一的订单ID号
$out_trade_no = date('YmdHis', time());


$outparams =array();
//获取token值
$reqHandler = new RequestHandler();
$reqHandler->init($APP_ID, $APP_SECRET, $PARTNER_KEY, $APP_KEY);
$Token= $reqHandler->GetToken();
if ( $Token !='' ){
    //=========================
    //生成预支付单
    //=========================
    //设置packet支付参数
    $packageParams =array();        

    $packageParams['bank_type']     = 'WX';             //支付类型
    $packageParams['body']          = $subject;         //商品描述
    $packageParams['fee_type']      = '1';              //银行币种
    $packageParams['input_charset'] = 'GBK';            //字符集
    $packageParams['notify_url']    = $notify_url;      //通知地址
    $packageParams['out_trade_no']  = $out_trade_no;    //商户订单号
    $packageParams['partner']       = $PARTNER;         //设置商户号
    $packageParams['total_fee']     = $total;           //商品总金额,以分为单位
    $packageParams['spbill_create_ip']= $_SERVER['REMOTE_ADDR'];  //支付机器IP
    //获取package包
    $package= $reqHandler->genPackage($packageParams);
    $time_stamp = time();
    $nonce_str = md5(rand());
    //设置支付参数
    $signParams =array();
    $signParams['appid']    =$APP_ID;
    $signParams['appkey']   =$APP_KEY;
    $signParams['noncestr'] =$nonce_str;
    $signParams['package']  =$package;
    $signParams['timestamp']=$time_stamp;
    $signParams['traceid']  = 'mytraceid_001';
    //生成支付签名
    $sign = $reqHandler->createSHA1Sign($signParams);
    //增加非参与签名的额外参数
    $signParams['sign_method']      ='sha1';
    $signParams['app_signature']    =$sign;
    //剔除appkey
    unset($signParams['appkey']); 
    //获取prepayid
    $prepayid=$reqHandler->sendPrepay($signParams);

    if ($prepayid != null) {
        $pack   = 'Sign=WXPay';
        //输出参数列表
        $prePayParams =array();
        $prePayParams['appid']      =$APP_ID;
        $prePayParams['appkey']     =$APP_KEY;
        $prePayParams['noncestr']   =$nonce_str;
        $prePayParams['package']    =$pack;
        $prePayParams['partnerid']  =$PARTNER;
        $prePayParams['prepayid']   =$prepayid;
        $prePayParams['timestamp']  =$time_stamp;
        //生成签名
        $sign=$reqHandler->createSHA1Sign($prePayParams);

        $outparams['retcode']=0;
        $outparams['retmsg']='ok';
        $outparams['appid']=$APP_ID;
        $outparams['noncestr']=$nonce_str;
        $outparams['package']=$pack;
        $outparams['partnerid']=$PARTNER;
        $outparams['prepayid']=$prepayid;
        $outparams['timestamp']=$time_stamp;
        $outparams['sign']=$sign;

    }else{
        $outparams['retcode']=-2;
        $outparams['retmsg']='错误：获取prepayId失败';
    }
}else{
    $outparams['retcode']=-1;
    $outparams['retmsg']='错误：获取不到Token';
}

    //Json 输出
    ob_clean();
    echo json_encode($outparams);

?>