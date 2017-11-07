<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::any('/wechat', 'WechatController@serve');

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'ArticleController@index');
    Route::resource('users', 'WechatController');
    Route::get('remarkuser/{openid}/{mark}', 'WechatController@remarkUser');
    Route::resource('menu', 'MenuController');
    Route::resource('seats', 'SeatController');
    Route::resource('articles', 'ArticleController');
    Route::get('getseats/{theatre}', 'SeatController@getSeatsForTheartre');
    Route::get('orderseat/{seat}', 'SeatController@orderSeat');
    Route::get('buyseat/{seatid}', 'SeatController@buySeat');

});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
    });
});
