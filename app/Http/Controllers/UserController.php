<?php

namespace App\Http\Controllers;

use App\User;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $wechat;

    /**
     * WechatController constructor.
     * @param $wechat
     */
    public function __construct(Application $wechat)
    {
        $this->wechat = $wechat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $wechat = new Application(config('wechat'));
        $userService = $this->wechat->user;
        $users = $userService->lists();
        $userList = array();
        foreach ($users['data']['openid'] as $openid) {
            $user = $this->wechat->user->get($openid);
            array_push($userList, $user);
            User::create([
                'name'   => $user['nickname'],
                'openid' => $openid,
                'avatar' => $user['headimgurl'],
            ]);
        }
        return $userList;
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
        $userService = $this->wechat->user;
        $users = $userService->lists();
        $userList = array();
        foreach ($users['data']['openid'] as $openid) {
            $user = $this->wechat->user->get($openid);
            array_push($userList, $user);
            User::create([
                'name'   => $user['nickname'],
                'openid' => $openid,
                'avatar' => $user['headimgurl'],
            ]);
        }
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
