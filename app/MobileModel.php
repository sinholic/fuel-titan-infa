<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileModel extends Model
{
    use SoftDeletes;
    // protected $table = "mobile_station";
    protected $table = "equipment_unitdata";
    protected $guarded = [];

    public function fixstation()
    {
        return $this->belongsTo('App\FixStationModel', 'fixstation_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'userassignments', 'user_id', 'station_id')->withPivot('start_date', 'end_date','mobile')->withTimestamps();
    }
}
