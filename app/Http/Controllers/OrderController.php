<?php

namespace App\Http\Controllers;
use EasyWeChat\Foundation\Application;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $app;

    /**
     * SeatController constructor.
     */
    public function __construct(Application $wechat)
    {
        $this->app = $wechat;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(15);
        $totalOrders = Order::count();
        return view('orders/index', ['orders'=>$orders, 'totalOrders'=>$totalOrders]);
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {

    }

    public function payResponse(Request $request) {

    }

    public function orderForSeat($seatid) {
//        $response = $this->app->payment->handleNotify(function($notify, $successful){
//            dd($notify.' : '.$successful);
//            Order::create([
//                'order_type' => 1,
//                'title' => 'order response',
//                'description' => $notify,
//                'wechat_order' => 1, //$worder,
//                'trade_no'     => 1,
//                'detail' => $successful,
//                'fee' => 1,
//                'openid' => 'openid',
//                'count'  => 1,
//                'code'   => 'code',
//                'product_id' => 'pid',
//                'model' => 'model',
//                'media_id' => 1,
//                'created_by' => 1, //should replaced by auth userid,
//                'updated_by' => 1, //should replaced by auth userid,
//            ]);
//            return true; // 或者错误消息
//        });
//        Order::create([
//            'order_type' => 1,
//            'title' => 'order response',
//            'description' => $response,
//            'wechat_order' => 1, //$worder,
//            'trade_no'     => 1,
//            'detail' => 'result',
//            'fee' => 1,
//            'openid' => 'openid',
//            'code'   => 'code',
//            'product_id' => 'pid',
//            'count'  => 1,
//            'media_id' => 1,
//            'model' => 'model',
//            'created_by' => 1, //should replaced by auth userid,
//            'updated_by' => 1, //should replaced by auth userid,
//        ]);
        return redirect()->action('SceneController@index');
//        return $response; // 或者错误消息
//        dd($response);
        return $response;
        $seat = Seat::findOrFail($seatid);
        $playtime = strtotime($seat->playtime);
        $nowtime  = strtotime('now');
//        dd($seat->theatre);

        $code = $this->str_rand(8);
        $openid = session('wechat.oauth_user')->getId(); // 拿到授权用户资料
        $order = Order::create([
            'order_type' => 1,
            'title' => $seat->theatre->name.':'.$seat->description,
            'description' => $seat->description,
            'wechat_order' => 1, //$worder,
            'detail' => $seat->playtime,
            'fee' => $seat->price,
            'openid' => $openid,
            'code'   => $code,
            'product_id' => $seat->id,
            'model' => $seat->scene->id,
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
//        dd($image->media_id);
        $order->update([
            'media_id' => $image->media_id,
            'media_url'=> $image->url,
        ]);

        $broadcast = $this->app->broadcast;

//        $notice = $this->app->notice;
//        $messageId = $notice->send([
//            'touser' => $openid,
//            'template_id' => 'template-id',
//            'url' => 'xxxxx',
//            'data' => [
//                //...
//            ],
//        ]);


        $this->app->staff->message(new Text(['content' => '请保留好您的二维码，该二维码将作为您的购票凭证']))->to($openid)->send();
        $this->app->staff->message(new Image([
            'media_id' => $image->media_id,
        ]))->to($openid)->send();

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

}
