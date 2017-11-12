<?php

namespace App\Http\Controllers;

use App\Seat;
use BaconQrCode\Encoder\QrCode;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use Illuminate\Http\Request;

class SeatController extends Controller
{
//    public $app;
//
//    /**
//     * SeatController constructor.
//     */
//    public function __construct()
//    {
//        $options = [
//            /**
//             * Debug 模式，bool 值：true/false
//             *
//             * 当值为 false 时，所有的日志都不会记录
//             */
//            'debug'  => true,
//
//            /**
//             * 账号基本信息，请从微信公众平台/开放平台获取
//             */
//            'app_id'  => 'your-app-id',         // AppID
//            'secret'  => 'your-app-secret',     // AppSecret
//            'token'   => 'your-token',          // Token
//            'aes_key' => '',                    // EncodingAESKey，安全模式下请一定要填写！！！
//
//            /**
//             * 日志配置
//             *
//             * level: 日志级别, 可选为：
//             *         debug/info/notice/warning/error/critical/alert/emergency
//             * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
//             * file：日志文件位置(绝对路径!!!)，要求可写权限
//             */
//            'log' => [
//                'level'      => 'debug',
//                'permission' => 0777,
//                'file'       => '/tmp/easywechat.log',
//            ],
//
//            /**
//             * OAuth 配置
//             *
//             * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
//             * callback：OAuth授权完成后的回调页地址
//             */
//            'oauth' => [
//                'scopes'   => ['snsapi_userinfo'],
//                'callback' => '/examples/oauth_callback.php',
//            ],
//
//            /**
//             * 微信支付
//             */
//            'payment' => [
//                'merchant_id'        => 'your-mch-id',
//                'key'                => 'key-for-signature',
//                'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
//                'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！
//                'notify_url'         => '默认的订单回调地址',       // 你也可以在下单时单独设置来想覆盖它
//                // 'device_info'     => '013467007045764',
//                // 'sub_app_id'      => '',
//                // 'sub_merchant_id' => '',
//                // ...
//            ],
//        ];
//        $this->app = new Application($options);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        //
    }

    public function getSeatsForTheartre($theatre) {
        $seats = Seat::where('theatre_id', $theatre)->get();
//        $k = count($seats);
//        $rows = count(Seat::where('theartre_id', $theartre)->where('line', 1)->get());
//        $lines = $k/$rows;
//        $seatsLines = array();
//        for($i=0; $i<$lines; $i++) {
//            $seatsRows = array();
//            for ($j=0; $j<$rows; $j++) {
//                $seat = $seats[$k];
//                array_push($seatsRows, $seat);
//                $k++;
//            }
//            array_push($seatsLines, $seatsRows);
//        }
        return view('theatre/show', ['seats'=>$seats]);
    }


    public function orderSeat($seatid) {
//        $options = [
//            // 前面的appid什么的也得保留哦
//            'app_id' => 'wxd2ff9ea209f500d0',
//            // ...
//            // payment
//            'payment' => [
//                'merchant_id'        => '1491687852',
//                'key'                => 'LO9ki8MJU7nhy6BGT5vfr4CDE3xsw2ZA',
//                'cert_path'          => '/cert/apiclient_cert.pem', // XXX: 绝对路径！！！！
//                'key_path'           => '/cert/apiclient_key.pem',      // XXX: 绝对路径！！！！
//                'notify_url'         => 'https://pay.weixin.qq.com/wxpay/pay.action',       // 你也可以在下单时单独设置来想覆盖它
//                // 'device_info'     => '013467007045764',
//                // 'sub_app_id'      => '',
//                // 'sub_merchant_id' => '',
//                // ...
//            ],
//        ];
//        $app = new Application($options);

        $app = new Application(config('wechat'));
        $js = $app->js;

//        return view('theatre/confirm_pay',['js'=>$js]);
        $seat = Seat::findOrFail($seatid);
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
//                dd($user->getId());
        $tradeNo = strtotime('now') * 1990 + 2017;
        $product = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => '舍得茶馆座票:'.$seat->description,
            'detail'           => '开场时间:'.$seat->playtime,
            'out_trade_no'     => $tradeNo,
            'total_fee'        => intval(round(floatval($seat->price) * 100)),
            'openid'           => $user->getId(),
            'notify_url'       => 'https://pay.weixin.qq.com/wxpay/pay.action', // 支付结果通知网址，如果不设置则会使用配置里的默认地址，我就没有在这里配，因为在.env内已经配置了。
            // ...
        ];
//        创建订单
        $order = new Order($product);
        $payment = $app->payment;
        $result = $payment->prepare($order); // 这里的order是上面一步得来的。 这个prepare()帮你计算了校验码，帮你获取了prepareId.省心。
        $prepayId = null;
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id; // 这个很重要。有了这个才能调用支付。
            $config = $payment->configForJSSDKPayment($prepayId); // 这个方法是取得js里支付所必须的参数用的。 没这个啥也做不了，除非你自己把js的参数生成一遍
            $config = [
                "appId" => $config['appId'],
                "nonceStr"=>$config['nonceStr'],
                "package"=> $config['package'],
                 "signType"=> $config['signType'],
                 "timeStamp"=> $config['timestamp'],
            ];
            $config["paySign"] = $this->MakeSign($config);

            $json = $payment->configForPayment($prepayId); // 返回 json 字符串，如果想返回数组，传第二个参数 false
//                        var_dump('config:'.$json);

            return view('theatre/pay',['js'=>$js,'config'=>json_encode($config), 'json'=>$json, "appId" => $config['appId'], "timestamp"=> $config['timestamp'], 'package'=>$config['package'], 'paySign'=>$config['paySign'], "nonceStr"=>$config['nonceStr'], "signType"=> $config['signType']]);
        } else {
            var_dump($result);
            die("出错了。");  // 出错就说出来，不然还能怎样？
        }

    }

    /**
     * 格式化参数格式化成url参数
     */
    public function ToUrlParams($config)
    {
        $buff = "";
        foreach ($config as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }

    /**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    public function MakeSign($config)
    {
        //签名步骤一：按字典序排序参数
        ksort($config);
        $string = $this->ToUrlParams($config);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=MJnxHFsxIAVzMMKfLHr7OxKRaQ0sFv4x";//.env('WECHAT_PAYMENT_KEY', '');
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;
    }

    public function buySeat($seat) {


//        $attributes = [
//            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
//            'body'             => '您将购买舍得茶馆座位。开场时间:'.date('m月d日 H:i',$seat->playtime),
//            'detail'           => $seat->description,
//            'out_trade_no'     => '1217752501201407033233368018',
//            'total_fee'        => $seat->price,
//            'notify_url'       => 'http://xxx.com/order-notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址，我就没有在这里配，因为在.env内已经配置了。
//            // ...
//        ];
//// 创建订单
//        $order = new Order($attributes);
//
//        $payment = $this->app->payment;
//        $result = $payment->prepare($order);
//        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS')
//        {
//            //生产那个订单后的逻辑
////            \Log::info('生成订单号..'.$data->order_guid);
//            //这一块是以ajax形式返回到页面上。
//            //用户的体验就是点击【确认支付】，验证码以弹层页面出来了（没错，还需要一个好用的弹层js）。
//            $ajax_data=[
//                'html'         =>   json_encode(QrCode::size(250)->generate($result['code_url'])),
//                'out_trade_no' =>  $data->order_guid,
//                'price'        =>  $data->price
//            ];
//            return $ajax_data;
//        }else{
//            return back()->withErrors('生成订单错误！');
//        }

    }
}

class WxPayDataBase
{
    protected $values = array();

    /**
     * 设置签名，详见签名生成算法
     * @param string $value
     **/
    public function SetSign()
    {
        $sign = $this->MakeSign();
        $this->values['sign'] = $sign;
        return $sign;
    }

    /**
     * 获取签名，详见签名生成算法的值
     * @return 值
     **/
    public function GetSign()
    {
        return $this->values['sign'];
    }

    /**
     * 判断签名，详见签名生成算法是否存在
     * @return true 或 false
     **/
    public function IsSignSet()
    {
        return array_key_exists('sign', $this->values);
    }

    /**
     * 输出xml字符
     * @throws WxPayException
     **/
    public function ToXml()
    {
        if(!is_array($this->values)
            || count($this->values) <= 0)
        {
            throw new WxPayException("数组数据异常！");
        }

        $xml = "<xml>";
        foreach ($this->values as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }

    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
    public function FromXml($xml)
    {
        if(!$xml){
            throw new WxPayException("xml数据异常！");
        }
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $this->values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $this->values;
    }

    /**
     * 格式化参数格式化成url参数
     */
    public function ToUrlParams()
    {
        $buff = "";
        foreach ($this->values as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }

    /**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    public function MakeSign()
    {
        //签名步骤一：按字典序排序参数
        ksort($this->values);
        $string = $this->ToUrlParams();
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=".WxPayConfig::KEY;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;
    }

    /**
     * 获取设置的值
     */
    public function GetValues()
    {
        return $this->values;
    }
}