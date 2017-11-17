<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'available', 'order', 'buyer_id', 'price',
    ];

    public function theatre() {
        return $this->belongsTo('App\Theartre', 'theatre_id');
    }

    public function buyer() {
        return $this->hasOne('App\User', 'buyer_id');
    }
}
