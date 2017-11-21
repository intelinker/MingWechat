<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theartre extends Model
{
    protected $fillable = [
        'name', 'address', 'description', 'lines', 'rows',
    ];

    public function scenes() {
        return $this->hasMany('App\Seat');
    }

    public function seats() {
        return $this->hasMany('App\Seat');
    }
}
