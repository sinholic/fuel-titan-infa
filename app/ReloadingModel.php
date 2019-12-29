<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReloadingModel extends Model
{
    use SoftDeletes;

    protected $table = "reloading";
    protected $fillable = ['fixstation_id', 'mobilestation_id', 'driver_mobile_statis', 'qty_solar', 'odometer'];

    public function mobilestation()
    {
        return $this->belongsTo('App\MobileModel', 'mobilestation_id', 'id')->withTrashed();
    }
    public function fixstation()
    {
        return $this->belongsTo('App\FixStationModel', 'station_id', 'id')->withTrashed();
    }
   
}
