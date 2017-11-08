<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public $menu;

    /**
     * MenuController constructor.
     * @param $menu
     */
    public function __construct(Application $app)
    {
        $this->menu = $app->menu;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->menu->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buttons = [
            [
                "type" => "click",
                "name" => "茶文雅集",
                "key"  => "CHA_WEN_YA_JI"
            ],
            [
                "name"       => "舍得茶馆",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "节目预告",
                        "url"  => "http://ming.cure4.net/getseats/1"
                    ],
                    [
                        "type" => "view",
                        "name" => "在线购票",
                        "url"  => "http://ming.cure4.net/getseats/2"
                    ],
                    [
                        "type" => "view",
                        "name" => "往期集锦",
                        "key" => "http://ming.cure4.net/getseats/3"
                    ],
                ],
            ],
            [
                "type" => "click",
                "name"       => "茗品荟萃",
                "key"  => "MING_PIN_HUI_CUI",
            ],
        ];
//        $buttons = [
//            [
//                "type" => "click",
//                "name" => "茶文雅集",
//                "key"  => "CHA_WEN_YA_JI",
//                "sub_button" => [
//                    [
//                        "type" => "view",
//                        "name" => "敬请期待",
//                        "url"  => "http://ming.cure4.net/getseats/1"
//                    ],
//                    [
//                        "type" => "view",
//                        "name" => "敬请期待",
//                        "url"  => "http://ming.cure4.net/getseats/1"
//                    ],
////                    [
////                        "type" => "view",
////                        "name" => "微杂志",
////                        "url"  => "http://www.soso.com/"
////                    ],
////                    [
////                        "type" => "view",
////                        "name" => "掌柜说",
////                        "url"  => "http://v.qq.com/"
////                    ],
////                    [
////                        "type" => "click",
////                        "name" => "文章搜索",
////                        "key" => "V1001_GOOD"
////                    ],
//                ],
//
//            ],
//            [
//                "type" => "click",
//                "name"       => "舍得茶馆",
//                "key"  => "SHE_DE_CHA_GUAN",
//                "sub_button" => [
//                    [
//                        "type" => "view",
//                        "name" => "节目预告",
//                        "url"  => "http://ming.cure4.net/getseats/1"
//                    ],
//                    [
//                        "type" => "view",
//                        "name" => "在线购票",
//                        "url"  => "http://ming.cure4.net/getseats/1"
//                    ],
//                    [
//                        "type" => "view",
//                        "name" => "往期集锦",
//                        "key" => "http://ming.cure4.net/getseats/1"
//                    ],
//                ],
//            ],
//            [
//                "type" => "click",
//                "name"       => "茗品荟萃",
//                "key"  => "MING_PIN_HUI_CUI",
//                "sub_button" => [
//                    [
//                        "type" => "view",
//                        "name" => "敬请期待",
//                        "url"  => "http://ming.cure4.net/getseats/1"
//                    ],
//                    [
//                        "type" => "view",
//                        "name" => "敬请期待",
//                        "url"  => "http://ming.cure4.net/getseats/1"
//                    ],
////                    [
////                        "type" => "view",
////                        "name" => "在线商城",
////                        "url"  => "http://www.soso.com/"
////                    ],
////                    [
////                        "type" => "view",
////                        "name" => "本月推荐",
////                        "url"  => "http://v.qq.com/"
////                    ],
////                    [
////                        "type" => "click",
////                        "name" => "寻茶记",
////                        "key" => "V1001_GOOD"
////                    ],
//                ],
//            ],
//        ];
        $this->menu->add($buttons);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->menu->current();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id == 0 ? $this->menu->destroy() : $this->menu->destroy($id);
    }

    public function delMenu($id) {
        $id == 0 ? $this->menu->destroy() : $this->menu->destroy($id);
    }
}
