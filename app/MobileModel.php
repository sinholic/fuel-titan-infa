<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileModel extends Model
{
    use SoftDeletes;
    protected $table = "mobile_station";
    // protected $table = "equipment_unitdata";
    // protected $guarded = [];
    protected $fillable = ['fixstation_id', 'equipment_id', 'impress_status', 'fuel_max_reload', 'stock_capacity'];

    public function fixstation()
    {
        return $this->belongsTo('App\FixStationModel', 'fixstation_id', 'id')->withTrashed();
    }

    public function equipment()
    {
        return $this->hasOne('App\EquipmentModel', 'id', 'equipment_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'userassignments', 'user_id', 'station_id')->withPivot('start_date', 'end_date','mobile')->withTimestamps();
    }

    public function temp_transactions()
    {
        return $this->hasMany('App\Impresstransaction', 'station_id', 'id');
    }

    public function reloadingunits()
    {
        return $this->hasMany('App\Reloadingunit', 'mobilestation_id', 'id');
    }

    public function reloading()
    {
        return $this->hasMany('App\ReloadingModel', 'mobilestation_id', 'id');
    }
}
