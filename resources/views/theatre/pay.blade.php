<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
<link rel="stylesheet" href="{{ asset("src/assets/stylesheets/styles.css") }}" />


<title>选座购票</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购票支付</title>

</head>
<body>
<div class="flex-center full-height container">
    <h3>{{$title}}</h3>

    <div>
        <p>{{$content}}</p>
        <p>票价：{{$fee}}元</p>
        <p style="color: orange">温馨提示：请提前15分钟到场。购票后，开场前24小时内不得退票。</p>
    </div>

</div>

<hr>

<div align="center">
    <button class="btn btn-lg btn-primary" type="button" onclick="callpay()" >购票</button>
</div>


<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>

<script type="text/javascript">
    //调用微信JS api 支付
    function jsApiCall()
    {
        {{--$config = {--}}
            {{--"appId": 'wxd2ff9ea209f500d0',//$config['appId'],     //公众号名称，由商户传入 , //--}}
            {{--"nonceStr":'{{$nonceStr}}', //$config['nonceStr'], //随机串--}}
            {{--"package":'{{$package}}', //$config['package'],--}}
            {{--"paySign":'{{$paySign}}',//$config['paySign'], //微信签名--}}
            {{--"signType":'{{$signType}}', //$config['signType'],         //微信签名方式：--}}
            {{--"timeStamp":'{{$timeStamp}}', //$config['timestamp'],         //时间戳，自1970年以来的秒数--}}
        {{--}--}}
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?= $json ?>,//$config,
            function(res){
                WeixinJSBridge.log(res.err_msg);
                alert(res.err_code+res.err_desc+res.err_msg);
            }
        );
    }

    function callpay($config)
    {
//        alert($config);
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

{{--<script type="text/javascript" charset="utf-8">--}}
    {{--wx.config({{ $js->config(array('chooseWXPay')) }});--}}
{{--</script>--}}
{{--<script>--}}



    {{--$(document).ready(function() {--}}
        {{--callpay('{!! $json !!}');--}}

        {{--if (typeof WeixinJSBridge == "undefined"){--}}
            {{--if (document.addEventListener) {--}}
                {{--document.addEventListener('WeixinJSBridgeReady', wxReadyFunc, false);--}}
            {{--} else if (document.attachEvent) {--}}
                {{--document.attachEvent('WeixinJSBridgeReady', wxReadyFunc);--}}
                {{--document.attachEvent('onWeixinJSBridgeReady', wxReadyFunc);--}}
            {{--}--}}
        {{--}else{--}}
            {{--WeixinJSBridge.invoke('getBrandWCPayRequest',"{{$json}}",function(res){--}}

                {{--WeixinJSBridge.log(res.err_msg);--}}
                {{--//alert(res.err_code+res.err_desc+res.err_msg);--}}
                {{--switch (res.err_msg){--}}
                    {{--case 'get_brand_wcpay_request:cancel':--}}
                        {{--alert('用户取消支付！');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:fail':--}}
                        {{--alert('支付失败！（'+res.err_desc+'）');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:ok':--}}
                        {{--alert('支付成功！');--}}
                        {{--break;--}}
                    {{--default:--}}
                        {{--alert(JSON.stringify(res));--}}
                        {{--break;--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}

{{--//        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {--}}
            {{--if( typeof WeixinJSBridge === 'undefined' ) {--}}
                {{--alert('请在微信打开页面！');--}}
                {{--return false;--}}
            {{--}--}}
            {{--WeixinJSBridge.invoke('getBrandWCPayRequest',"{{$json}}",function(res){--}}

                {{--WeixinJSBridge.log(res.err_msg);--}}
                {{--//alert(res.err_code+res.err_desc+res.err_msg);--}}
                {{--switch (res.err_msg){--}}
                    {{--case 'get_brand_wcpay_request:cancel':--}}
                        {{--alert('用户取消支付！');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:fail':--}}
                        {{--alert('支付失败！（'+res.err_desc+'）');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:ok':--}}
                        {{--alert('支付成功！');--}}
                        {{--break;--}}
                    {{--default:--}}
                        {{--alert(JSON.stringify(res));--}}
                        {{--break;--}}
                {{--}--}}
            {{--});--}}
{{--//        }, false);--}}

{{--//        if( typeof WeixinJSBridge === 'undefined' ) {--}}
{{--//            alert('请在微信在打开页面！');--}}
{{--//            return false;--}}
{{--//        }--}}
{{--//        WeixinJSBridge.invoke(--}}
{{--//            'getBrandWCPayRequest', $json, function(res) {--}}
{{--//                switch(res.err_msg) {--}}
{{--//                    case 'get_brand_wcpay_request:cancel':--}}
{{--//                        alert('用户取消支付！');--}}
{{--//                        break;--}}
{{--//                    case 'get_brand_wcpay_request:fail':--}}
{{--//                        alert('支付失败！（'+res.err_desc+'）');--}}
{{--//                        break;--}}
{{--//                    case 'get_brand_wcpay_request:ok':--}}
{{--//                        alert('支付成功！');--}}
{{--//                        break;--}}
{{--//                    default:--}}
{{--//                        alert(JSON.stringify(res));--}}
{{--//                        break;--}}
{{--//                }--}}
{{--//            }--}}
{{--//        );--}}


        {{--WeixinJSBridge.invoke(--}}
            {{--'getBrandWCPayRequest', "{{$json}}",--}}
            {{--function(res){--}}
                {{--if(res.err_msg == "get_brand_wcpay_request：ok" ) {--}}
                    {{--alert('支付成功。');--}}
{{--// 使用以上方式判断前端返回,微信团队郑重提示：--}}
{{--// res.err_msg将在用户支付成功后返回--}}
{{--// ok，但并不保证它绝对可靠。--}}
                {{--}--}}
            {{--}--}}
        {{--);--}}
        {{--alert("支付失败，请返回重试。");--}}
        {{--return false;--}}



        {{--wx.chooseWXPay({--}}
            {{--timestamp: "{{$config['timestamp']}}", // 支付签名时间戳，注意微信jssdk中的所有使用timestamp字段均为小写。但最新版的支付后台生成签名使用的timeStamp字段名需大写其中的S字符--}}
            {{--nonceStr: '{{$config['nonceStr']}}', // 支付签名随机串，不长于 32 位--}}
            {{--package: '{{$config['package']}}', // 统一支付接口返回的prepay_id参数值，提交格式如：prepay_id=***）--}}
            {{--signType: '{{$config['signType']}}', // 签名方式，默认为'SHA1'，使用新版支付需传入'MD5'--}}
            {{--paySign: '{{$config['paySign']}}', // 支付签名--}}
            {{--success: function (res) {--}}
                {{--// 支付成功后的回调函数--}}
                {{--if(res.err_msg == "get_brand_wcpay_request：ok" ) {--}}
                    {{--alert('支付成功。');--}}
                    {{--window.location.href="{{url("wechat/pay_ok")}}";--}}
                {{--}else{--}}
                    {{--//alert(res.errMsg);--}}
                    {{--alert("支付失败，请返回重试。");--}}
                {{--}--}}
            {{--},--}}
            {{--fail: function (res) {--}}
                {{--alert("支付失败，请返回重试。");--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}


    {{--function pay($config) {--}}
        {{--alert("pay");--}}
        {{--if( typeof WeixinJSBridge === 'undefined' ) {--}}
            {{--alert('请在微信打开页面！');--}}
            {{--return false;--}}
        {{--}--}}
        {{--WeixinJSBridge.invoke('getBrandWCPayRequest',"{{$json}}",function(res){--}}

            {{--WeixinJSBridge.log(res.err_msg);--}}
            {{--//alert(res.err_code+res.err_desc+res.err_msg);--}}
            {{--switch (res.err_msg){--}}
                {{--case 'get_brand_wcpay_request:cancel':--}}
                    {{--alert('用户取消支付！');--}}
                    {{--break;--}}
                {{--case 'get_brand_wcpay_request:fail':--}}
                    {{--alert('支付失败！（'+res.err_desc+'）');--}}
                    {{--break;--}}
                {{--case 'get_brand_wcpay_request:ok':--}}
                    {{--alert('支付成功！');--}}
                    {{--break;--}}
                {{--default:--}}
                    {{--alert(JSON.stringify("{{$json}}"));--}}
                    {{--break;--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}

{{--//    $(function(){--}}
{{--//--}}
{{--//        $("#btnPay").click(function(){--}}
{{--//--}}
{{--//        });--}}
{{--//    });--}}

    {{--$(document).on('WeixinJSBridgeReady',function(){--}}
        {{--$('#weiXinPay').onclick = function (e) {--}}
        {{--alert(JSON.stringify($(this)));--}}
        {{--pay('{{$json}}');--}}
    {{--};--}}
    {{--});--}}

    {{--function onBridgeReady($config){--}}
        {{--WeixinJSBridge.invoke(--}}
            {{--'getBrandWCPayRequest', $config--}}
{{--//            {--}}
{{--//                "appId":$config['appId'],     //公众号名称，由商户传入--}}
{{--//                "timeStamp":$config['timeStamp'],         //时间戳，自1970年以来的秒数--}}
{{--//                "nonceStr":$config['nonceStr'], //随机串--}}
{{--//                "package":$config['package'],--}}
{{--//                "signType":$config['signType'],         //微信签名方式：--}}
{{--//                "paySign":$config['paySign'], //微信签名--}}
{{--//            },--}}
            {{--function(res){--}}
{{--//                if(res.err_msg == "get_brand_wcpay_request:ok" ) {}     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。--}}
                {{--switch (res.err_msg){--}}
                    {{--case 'get_brand_wcpay_request:cancel':--}}
                        {{--alert('用户取消支付！');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:fail':--}}
                        {{--alert('支付失败！（'+res.err_desc+'）');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:ok':--}}
                        {{--alert('支付成功！');--}}
                        {{--break;--}}
                    {{--default:--}}
                        {{--alert('ok');--}}
                        {{--break;--}}
                {{--}--}}
            {{--}--}}
        {{--);--}}
    {{--}--}}
    {{--if (typeof WeixinJSBridge == "undefined"){--}}
        {{--if( document.addEventListener ){--}}
            {{--document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);--}}
        {{--}else if (document.attachEvent){--}}
            {{--document.attachEvent('WeixinJSBridgeReady', onBridgeReady);--}}
            {{--document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);--}}
        {{--}--}}
    {{--}else{--}}
        {{--onBridgeReady("{{$json}}");--}}
    {{--}--}}



    {{--function callpay($config)--}}
    {{--{--}}
        {{--$config = {--}}
                    {{--"appId": 'wxd2ff9ea209f500d0',//$config['appId'],     //公众号名称，由商户传入 , //--}}
                    {{--"timeStamp":'{{$timeStamp}}', //$config['timestamp'],         //时间戳，自1970年以来的秒数--}}
                    {{--"nonceStr":'{{$nonceStr}}', //$config['nonceStr'], //随机串--}}
                    {{--"package":'{{$package}}', //$config['package'],--}}
                    {{--"signType":'{{$signType}}', //$config['signType'],         //微信签名方式：--}}
                    {{--"paySign":'{{$paySign}}'//$config['paySign'], //微信签名--}}
                {{--}--}}
{{--//        alert(JSON.stringify($config));--}}
        {{--document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {--}}
            {{--WeixinJSBridge.invoke('getBrandWCPayRequest', $config--}}
                {{--JSON.parse(JSON.stringify({--}}
                    {{--"appId": 'wxd2ff9ea209f500d0',//$config['appId'],     //公众号名称，由商户传入 , //--}}
                    {{--"timeStamp":'{{$timeStamp}}', //$config['timestamp'],         //时间戳，自1970年以来的秒数--}}
                    {{--"nonceStr":'{{$nonceStr}}', //$config['nonceStr'], //随机串--}}
                    {{--"package":'{{$package}}', //$config['package'],--}}
                    {{--"signType":'{{$signType}}', //$config['signType'],         //微信签名方式：--}}
                    {{--"paySign":'{{$paySign}}'//$config['paySign'], //微信签名--}}
                {{--}))--}}
                {{--,function(res){--}}

                {{--WeixinJSBridge.log(res.err_msg);--}}
                {{--//alert(res.err_code+res.err_desc+res.err_msg);--}}
                {{--switch (res.err_msg){--}}
                    {{--case 'get_brand_wcpay_request:cancel':--}}
                        {{--alert('用户取消支付！');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:fail':--}}
                        {{--alert('支付失败！（'+JSON.stringify($config)+'）');--}}
                        {{--break;--}}
                    {{--case 'get_brand_wcpay_request:ok':--}}
                        {{--alert('支付成功！');--}}
                        {{--break;--}}
                    {{--default:--}}
                        {{--alert('ok');--}}
                        {{--break;--}}
                {{--}--}}
            {{--}--}}
            {{--);--}}
        {{--}, false);--}}
    {{--}--}}
{{--</script>--}}
</body>
</html>