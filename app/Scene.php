<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    protected $fillable = [
        'theme', 'description', 'theatre_id', 'lines', 'rows', 'playtime', 'duration', 'price',
    ];

    public function theatre() {
        return $this->belongsTo('App\Theartre', 'theatre_id');
    }

    public function seats() {
        return $this->hasMany('App\Theartre', 'theatre_id');
    }
}
