<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FixStationModel extends Model
{
    use SoftDeletes;
    protected $table = "fix_station";
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo('App\Companycode', 'companycode_id', 'id');
    }

    public function mobiles()
    {
        return $this->hasMany('App\MobileModel', 'fixstation_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'userassignments', 'user_id', 'station_id')->withPivot('start_date', 'end_date','mobile')->withTimestamps();
    }
}
