<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impresstransaction extends Model
{
    protected $guarded = [];

    public function mobilestation()
    {
        return $this->belongsTo('App\MobileModel', 'station_id', 'id');
    }
}
