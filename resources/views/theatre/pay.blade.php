<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购买支付</title>
</head>
<body>

{{--<h1>一盒火柴</h1>--}}

{{--<div>--}}
    {{--<p>您购买了“一盒火柴”，总价格： 0.01元。</p>--}}
    {{--<p>数量：1盒。</p>--}}
{{--</div>--}}

{{--<hr>--}}

{{--<div>--}}
    {{--<input name="button" id="btnPay" type="button" value="支付"  onclick="pay($config)"/>--}}
{{--</div>--}}



<script src="{{ url('/src/js/jQuery.min.2.2.4.js') }}" ></script>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
{{--<script type="text/javascript" charset="utf-8">--}}
    {{--wx.config({{ $js->config(array('chooseWXPay')) }});--}}
{{--</script>--}}
<script>
    $(document).ready(function() {

        WeixinJSBridge.invoke(
            'getBrandWCPayRequest', "{{$json}}",
            function(res){
                if(res.err_msg == "get_brand_wcpay_request：ok" ) {
                    alert('支付成功。');
// 使用以上方式判断前端返回,微信团队郑重提示：
// res.err_msg将在用户支付成功后返回
// ok，但并不保证它绝对可靠。
                }
            }
        );
        alert("支付失败，请返回重试。");
        return false;
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
    });
    {{--function pay($config) {--}}
        {{--alert("pay");--}}
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
    {{--}--}}

    {{--$(function(){--}}

        {{--$("#btnPay").click(function(){--}}

        {{--});--}}
    {{--});--}}
</script>
</body>
</html>