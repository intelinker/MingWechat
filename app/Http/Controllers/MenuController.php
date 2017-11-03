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
    public function __construct(Application $menu)
    {
        $this->menu = $menu;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                "key"  => "CHA_WEN_YA_JI",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "二级1",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "二级2",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "二级3",
                        "key" => "V1001_GOOD"
                    ],
                ],

            ],
            [
                "type" => "click",
                "name"       => "舍得茶馆",
                "key"  => "SHE_DE_CHA_GUAN",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "购票",
                        "url"  => "http://ming.cure4.net/"
                    ],
                    [
                        "type" => "view",
                        "name" => "二级2",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "二级3",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
            [
                "type" => "click",
                "name"       => "茗品荟萃",
                "key"  => "MING_PIN_HUI_CUI",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "二级1",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "二级2",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "二级3",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
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
        //
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
        //
    }
}
