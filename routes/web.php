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
Route::get('ticket', 'OrderController@orderForSeat');

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'ArticleController@index');
    Route::resource('wechats', 'WechatController');
    Route::resource('users', 'UserController');
    Route::get('remarkuser/{openid}/{mark}', 'WechatController@remarkUser');
    Route::resource('menu', 'MenuController');
    Route::resource('seats', 'SeatController');
    Route::resource('articles', 'ArticleController');
    Route::resource('orders', 'OrderController');
    Route::resource('scenes', 'SceneController');
    Route::resource('theatres', 'TheatreController');
    Route::get('getseats/{theatre}', 'SeatController@getSeatsForTheartre');
    Route::get('seatavailable/{seatid}/{available}', 'SeatController@setAvailable');
    Route::get('editseats/{theatre}', 'SeatController@editSeats');
    Route::get('delmenu/{menuid}', 'MenuController@delMenu');
    Route::get('weidian', 'WechatController@goToWeidian');
//    Route::get('ticket', 'OrderController@orderForSeat');

    Route::get('checkticket/{openid}/{code}', 'SeatController@checkTicket');
    Route::post('payresponse', 'OrderController@payResponse');
    Route::get('createtheatre/{theatre}', 'SceneController@createForTheatre');
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('orderseat/{seat}', 'SeatController@orderSeat');
    Route::get('buyseat/{seatid}', 'SeatController@buySeat');
});
