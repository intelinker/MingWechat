<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'trade_no', 'scene_id', 'order_type', 'title', 'description', 'wechat_order', 'detail', 'fee', 'openid', 'product_id', 'model', 'code', 'media_id', 'media_url', 'buyer_id'
    ];

    public function type() {
        return $this->hasOne('App\OrderType', 'order_type');
    }

    public function buyer() {
        return $this->hasOne('App\User', 'openid', 'openid');
    }

    public function scene() {
        return$this->belongsTo('App\Scene', 'scene_id');
    }
}
