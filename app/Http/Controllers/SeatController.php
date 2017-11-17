<?php

namespace App\Http\Controllers;

use App\Seat;
use App\Ticket;
use BaconQrCode\Encoder\QrCode;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\News;
use EasyWeChat\Message\Text;
use EasyWeChat\Payment\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    public $app;

    /**
     * SeatController constructor.
     */
    public function __construct(Application $wechat)
    {
        $this->app = $wechat;
    }
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

//        $app = new Application(config('wechat'));
//        $js = $app->js;

//        return view('theatre/confirm_pay',['js'=>$js]);
        $seat = Seat::findOrFail($seatid);
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
        $tradeNo = strtotime('now') * 1990 + 2017;
        $product = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => '舍得茶馆座票:'.$seat->description,
            'detail'           => '开场时间:'.$seat->playtime,
            'out_trade_no'     => $tradeNo,
            'total_fee'        => intval(round(floatval($seat->price) * 100)),
            'openid'           => $user->getId(),
            'notify_url'       => 'http://ming.cure4.net/ticket/'.$seat->id //'https://pay.weixin.qq.com/wxpay/pay.action', // 支付结果通知网址，如果不设置则会使用配置里的默认地址，我就没有在这里配，因为在.env内已经配置了。
            // ...
        ];
//        创建订单


        $order = new Order($product);
        //                dd($user->getId());
//        dd($order);

        $payment = $this->app->payment;
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
//            dd($result);
            $json = $payment->configForPayment($prepayId); // 返回 json 字符串，如果想返回数组，传第二个参数 false
//                        var_dump('config:'.$json);

            return view('theatre/pay',['json'=>$json, 'title'=>$product['body'], 'content'=>$product['detail'], 'fee'=>$seat['price']]);
//            return view('theatre/pay',['js'=>$js,'config'=>json_encode($config), 'json'=>$json, "appId" => $config['appId'], "timeStamp"=> $config['timeStamp'], 'package'=>$config['package'], 'paySign'=>$config['paySign'], "nonceStr"=>$config['nonceStr'], "signType"=> $config['signType']]);
        } else {
            var_dump($result);
            die("出错了。");  // 出错就说出来，不然还能怎样？
        }

    }

    public function editSeats($theatre) {
        $seats = Seat::where('theatre_id', $theatre)->get();
        return view('theatre/edit', ['seats'=>$seats]);
    }

    public function setAvailable($theatre, $seatid, $available) {
//        $seat = Seat::findOrFail($seatid);
//        $seat->available = $available;
//        $seat->update($seat);
        Seat::where('id', $seatid)->update(['available'=>$available]);
        $seats = Seat::where('theatre_id', $theatre)->get();
        return view('theatre/edit', ['seats'=>$seats]);
    }

    /*
 * 生成随机字符串 生成唯一字符串用到的方法有 md5(),uniqid(),microtime()
 * @param int $length 生成随机字符串的长度
 * @param string $char 组成随机字符串的字符串
 * @return string $string 生成的随机字符串
 */
    function str_rand($length = 8, $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        if(!is_int($length) || $length < 0) {
            return false;
        }

        $string = '';
        for($i = $length; $i > 0; $i--) {
            $string .= $char[mt_rand(0, strlen($char) - 1)];
        }

        return $string;
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

    public function ticketForSeat($seatid) {
        $response = $this->app->payment->handleNotify(function($notify, $successful){
            dd($notify.' : '.$successful);
            return true; // 或者错误消息
        });
        dd($response);
        return $response;
        $seat = Seat::findOrFail($seatid);
        $playtime = strtotime($seat->playtime);
        $nowtime  = strtotime('now');
//        dd($seat->theatre);

        $code = $this->str_rand(8);
        $openid = session('wechat.oauth_user')->getId(); // 拿到授权用户资料
        $order = \App\Order::create([
            'order_type' => 1,
            'title' => $seat->theatre->name.':'.$seat->description,
            'description' => $seat->description,
            'wechat_order' => 1, //$worder,
            'detail' => $seat->playtime,
            'fee' => $seat->price,
            'openid' => $openid,
            'code'   => $code,
            'product_id' => $seat->id,
            'model' => $seat->theatre->name,
            'created_by' => 1, //should replaced by auth userid,
            'updated_by' => 1, //should replaced by auth userid,
        ]);

        $url = 'http://ming.cure4.net/checkticket/'.$order->id.'/'.$openid.'/'.$code;
        $qrCode = new \Endroid\QrCode\QrCode($url);
        $qrCode->setSize(300);
        $path = 'qrcode/tickets/'.$code.'.png';
        // Save it to a file
        $qrCode->writeFile($path);

//        $app = new Application(config('wechat'));
        $image = $this->app->material->uploadImage($path);
        $order->update([
            'media_id' => $image['media_id'],
            'media_url'=> $image['url'],
        ]);

        $app->staff->message(new Text(['content' => '请保留好您的二维码，该二维码将作为您的购票凭证']));
        $app->staff->message($image)->to($openid)->send();

        // Directly output the QR code
//        header('Content-Type: '.$qrCode->getContentType());
//        dd($qrCode->writeString());

//        $qrcode = $app->qrcode;
//        $result = $qrcode->card([
//            "card_id" => $order->id,
//            "code"    => $order->code,
//            "openid"  => $order->openid,
//            "expire_seconds" => $playtime - $nowtime + 2* 3600,
//            "is_unique_code" => true,
//        ]);//temporary(56, $playtime - $nowtime + 2* 3600); //有效期购票时间开始至开场后2小时
//        dd($result);
//        $ticket = $result->ticket;// 或者 $result['ticket']
////        $expireSeconds = $result->expire_seconds; // 有效秒数
//        $url = $result->url; // 二维码图片解析后的地址，开发者可根据该地址自行生成需要的二维码图片
//        dd($url);
//
//        $news = new News([
//            'title'       => $order['title'],
//            'description' => '...',
//            'url'         => $url,
//            'image'       => $image,
//        ]);
    }

    public function checkTicket($orderid, $openid, $code) {
        $order = \App\Order::where('id', $orderid)
                    ->where('openid', $openid)
                    ->where('code', $code)->first;
        if (count($order) > 0) {

        }
    }
}