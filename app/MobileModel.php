<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileModel extends Model
{
    use SoftDeletes;
    protected $table = "mobile_station";
    protected $guarded = [];

    public function fixstation()
    {
        return $this->belongsTo('App\FixStationModel', 'fixstation_id', 'id');
    }
}
