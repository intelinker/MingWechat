<!--<html>-->
<!--<head>-->
<!--    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1"/> -->
<!--    <title>微信支付样例</title>-->
<!--    <style type="text/css">-->
<!--        ul {-->
<!--            margin-left:10px;-->
<!--            margin-right:10px;-->
<!--            margin-top:10px;-->
<!--            padding: 0;-->
<!--        }-->
<!--        li {-->
<!--            width: 32%;-->
<!--            float: left;-->
<!--            margin: 0px;-->
<!--            margin-left:1%;-->
<!--            padding: 0px;-->
<!--            height: 100px;-->
<!--            display: inline;-->
<!--            line-height: 100px;-->
<!--            color: #fff;-->
<!--            font-size: x-large;-->
<!--            word-break:break-all;-->
<!--            word-wrap : break-word;-->
<!--            margin-bottom: 5px;-->
<!--        }-->
<!--        a {-->
<!--            -webkit-tap-highlight-color: rgba(0,0,0,0);-->
<!--        	text-decoration:none;-->
<!--            color:#fff;-->
<!--        }-->
<!--        a:link{-->
<!--            -webkit-tap-highlight-color: rgba(0,0,0,0);-->
<!--        	text-decoration:none;-->
<!--            color:#fff;-->
<!--        }-->
<!--        a:visited{-->
<!--            -webkit-tap-highlight-color: rgba(0,0,0,0);-->
<!--        	text-decoration:none;-->
<!--            color:#fff;-->
<!--        }-->
<!--        a:hover{-->
<!--            -webkit-tap-highlight-color: rgba(0,0,0,0);-->
<!--        	text-decoration:none;-->
<!--            color:#fff;-->
<!--        }-->
<!--        a:active{-->
<!--            -webkit-tap-highlight-color: rgba(0,0,0,0);-->
<!--        	text-decoration:none;-->
<!--            color:#fff;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--	<div align="center">-->
<!--        <ul>-->
<!--            <li style="background-color:#FF7F24"><a href="./example/jsapi.php">JSAPI支付</a></li>-->
<!--            <li style="background-color:#698B22"><a href="http://paysdk.weixin.qq.com/example/micropay.php">刷卡支付</a></li>-->
<!--            <li style="background-color:#8B6914"><a href="http://paysdk.weixin.qq.com/example/native.php">扫码支付</a></li>-->
<!--            <li style="background-color:#CDCD00"><a href="http://paysdk.weixin.qq.com/example/orderquery.php">订单查询</a></li>-->
<!--            <li style="background-color:#CD3278"><a href="http://paysdk.weixin.qq.com/example/refund.php">订单退款</a></li>-->
<!--            <li style="background-color:#848484"><a href="http://paysdk.weixin.qq.com/example/refundquery.php">退款查询</a></li>-->
<!--            <li style="background-color:#8EE5EE"><a href="http://paysdk.weixin.qq.com/example/download.php">下载订单</a></li>-->
<!--        </ul>-->
<!--	</div>-->
<!--</body>-->
<!--</html>-->

<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "./lib/WxPay.Api.php";
require_once "./example/WxPay.JsApiPay.php";
require_once './example/log.php';

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "info";
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("test");
$input->SetAttach("test");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee("1");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>微信支付样例-支付</title>
    <script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $jsApiParameters; ?>,
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    alert(res.err_code+res.err_desc+res.err_msg);
                }
            );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
    </script>
    <script type="text/javascript">
        //获取共享地址
        function editAddress()
        {
            WeixinJSBridge.invoke(
                'editAddress',
                <?php echo $editAddress; ?>,
                function(res){
                    var value1 = res.proviceFirstStageName;
                    var value2 = res.addressCitySecondStageName;
                    var value3 = res.addressCountiesThirdStageName;
                    var value4 = res.addressDetailInfo;
                    var tel = res.telNumber;

                    alert(value1 + value2 + value3 + value4 + ":" + tel);
                }
            );
        }

        window.onload = function(){
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', editAddress, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', editAddress);
                    document.attachEvent('onWeixinJSBridgeReady', editAddress);
                }
            }else{
                editAddress();
            }
        };

    </script>
</head>
<body>
<br/>
<font color="#9ACD32"><b>该笔订单支付金额为<span style="color:#f00;font-size:50px">1分</span>钱</b></font><br/><br/>
<div align="center">
    <button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
</div>
</body>
</html>