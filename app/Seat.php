<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'description', 'available', 'order', 'buyer_id', 'price', 'theatre_id', 'scene_id', 'line', 'row'
    ];

    public function theatre() {
        return $this->belongsTo('App\Theartre', 'theatre_id');
    }

    public function scene() {
        return $this->belongsTo('App\Theartre', 'scene_id');
    }

    public function buyer() {
        return $this->hasOne('App\User', 'buyer_id');
    }
}
