<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theartre extends Model
{


    public function seats() {
        return $this->hasMany('App\Seat');
    }
}
