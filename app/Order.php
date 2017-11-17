<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_type', 'title', 'description', 'wechat_order', 'detail', 'fee', 'openid', 'product_id', 'model', 'code',
    ];

    public function type() {
        return $this->hasOne('App\OrderType', 'order_type');
    }

    public function buyer() {
        return $this->hasOne('App\User', 'openid');
    }
}
